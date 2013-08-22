<?php
class grocery_crud_model_SQLSRV extends grocery_CRUD_Generic_Model {
  /**
   * Get field types from basic table 
   * @return array list of field with meta-data from database
   */
  function get_field_types_basic_table()
  {
        $db_field_types = array();
        //thanks to marc_s for this nice query
        $show_colums = "SELECT 
                            c.name 'field',
                            t.name 'type',
                            c.max_length 'max_length',
                            c.precision ,
                            c.scale ,
                            c.is_nullable,
                            ISNULL(i.is_primary_key, 0) 'primary_key'
                        FROM    
                            sys.columns c
                        INNER JOIN 
                            sys.types t ON c.system_type_id = t.system_type_id
                        LEFT OUTER JOIN 
                            sys.index_columns ic ON ic.object_id = c.object_id AND ic.column_id = c.column_id
                        LEFT OUTER JOIN 
                            sys.indexes i ON ic.object_id = i.object_id AND ic.index_id = i.index_id
                        WHERE
                            c.object_id = OBJECT_ID(?)
                        AND t.name <> 'sysname'";

        $rows_metadata = $this->db->query($show_colums, array($this->table_name));

        foreach ($rows_metadata->result() as $db_field_type) {
            
            $db_field_types[$db_field_type->field]['db_max_length'] = $db_field_type->max_length;
            $db_field_types[$db_field_type->field]['db_type']       = $db_field_type->type;
            $db_field_types[$db_field_type->field]['db_null']       = ($db_field_type->is_nullable == 1) ? true : false;
            $db_field_types[$db_field_type->field]['primary_key']   = $db_field_type->primary_key;
            $db_field_types[$db_field_type->field]['name']          = $db_field_type->field;
            $db_field_types[$db_field_type->field]['db_extra']      = $this->check_db_extra($db_field_type);
        }
        
        $results = $this->get_field_types($this->table_name);

        foreach($results as $num => $row)
        {
            $row = (array)$row;
            $results[$num] = (object)( array_merge($row, $db_field_types[$row['name']])  );
            $results[$num]->type = $results[$num]->db_type; 
        }
        
        return $results;
    }

    /**
     * Check id field is identity and assign extra properties to it
     * @param  object $db_field_type field meta-data
     * @return string extra property
     */
    public function check_db_extra($db_field_type)
    {   
        $extra = '';
        return ($db_field_type->primary_key === 1) 
                ? $extra = 'auto_increment'
                : $extra = '';
    }

    function get_primary_key($table_name = null)
    {

        if($table_name == null)
        {
            if(isset($this->primary_keys[$this->table_name]))
            {
                return $this->primary_keys[$this->table_name];
            }
            
            if(empty($this->primary_key))
            {
                
                $fields = $this->get_field_types_basic_table();

                foreach($fields as $field)
                {
                    if($field->primary_key == 1)
                    {
                        return $field->name;
                    }
                }

                return false;
            }
            else
            {
                return $this->primary_key;
            }
        }
        else
        {
            
            if(isset($this->primary_keys[$table_name]))
            {
                return $this->primary_keys[$table_name];
            }

            $fields = $this->get_field_types_basic_table($table_name);
            
            foreach($fields as $field)
            {
                if($field->primary_key == 1)
                {
                    return $field->name;
                }
            }

            return false;
        }

    }

     function get_relation_array($field_name , $related_table , $related_field_title, $where_clause, $order_by, $limit = null, $search_like = null)
    {
        $relation_array = array();
        $field_name_hash = $this->_unique_field_name($field_name);

        $related_primary_key = $this->get_primary_key($related_table);
        
        $select = $this->protect_identifiers($related_table).'.'.$this->protect_identifiers($related_primary_key).', ';

        if(strstr($related_field_title,'{'))
        {
            $related_field_title = str_replace(" ", "&nbsp;", $related_field_title);
            $select .= $this->build_concat_from_template(
                    $related_field_title,
                    $this->ESCAPE_CHAR,
                    $this->ESCAPE_CHAR,
                    $this->protect_identifiers($field_name_hash)
                );
            //$select .= "CONCAT('".str_replace(array('{','}'),array("',COALESCE(".$this->ESCAPE_CHAR , $this->ESCAPE_CHAR.", ''),'"),str_replace("'","\\'", $related_field_title))."') as ".$this->protect_identifiers($field_name_hash);
        }
        else
        {
            $select .= $this->protect_identifiers($related_table.'.'.$related_field_title).' as '.$this->protect_identifiers($field_name_hash);
        }

        $this->db->select($select,false);
        if($where_clause !== null)
            $this->db->where($where_clause);

        if($where_clause !== null)
            $this->db->where($where_clause);

        if($limit !== null)
            $this->db->limit($limit);

        if($search_like !== null)
            $this->db->having($this->protect_identifiers($field_name_hash)." LIKE '%".$this->db->escape_like_str($search_like)."%'");

        $order_by !== null
            ? $this->db->order_by($order_by)
            : $this->db->order_by($field_name_hash);

        $results = $this->db->get($related_table)->result();

        foreach($results as $row)
        {
            $relation_array[$row->$related_primary_key] = $row->$field_name_hash;
        }

        return $relation_array;
    }

}
