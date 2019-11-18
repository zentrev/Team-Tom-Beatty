<?php
    class simpleCMS {
    
        var $layout;
        var $insertData;

        // Public Page
        public function Display_public() {
            
        }
    
        // Admin page
        public function Display_admin() {
        
        }

        // Sava info to Database
        public function Write() {
        
        }
    
        // Get Page info
        public function Connect($page, $mysqli) {
            // Style
            $query = "SELECT * FROM layout WHERE is_active = 1";
            $result = $mysqli->query($query);
            $num_results = $result->num_rows;
            if($num_results > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    extract($row);
                    echo "<link href='style_sheets/".$style_name.".css' rel='stylesheet'>";
                }
            }

            // // Nav Bar
            // $query = "SELECT * FROM routes ORDER BY category";
            // $result = $mysqli->query($query);
            // $num_results = $result->num_rows;
            // if($num_results > 0)
            // {
            //     while($row = $result->fetch_assoc())
            //     {
            //         extract($row);
            //         echo "<link href='style_sheets/".$style_name.".css' rel='stylesheet'>";
            //     }
            // }

            // Inserts
            $query = "SELECT * FROM content WHERE page_name = '".$page."' ORDER BY `content`.`order` ASC";
            $result = $mysqli->query($query);
            $num_results = $result->num_rows;
            if($num_results > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    extract($row);
                    include "inserts/".$insert_name.".php";
                }
            }
        }
    
        // Build Database if none exist
        private function BuildDB() {
        
        }
    }
?>