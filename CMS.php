<?php
    class simpleCMS {
    
        var $layout;
        var $insertData;

        // Public Page
        public function Display_public($page, $mysqli) {
            // Style
            $query = "SELECT * FROM layout WHERE is_active = 1";
            $result = $mysqli->query($query);
            $num_results = $result->num_rows;
            if($num_results > 0)
            {
                $row = $result->fetch_assoc();
                extract($row);
                echo "<link href='style_sheets/".$style_name.".css' rel='stylesheet'>";
            }

            // Nav Bar
            // $query = "SELECT * FROM categories ORDER BY category_order";
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
    
        // Admin page
        public function Display_admin() {
            echo file_get_contents("adminBar.php");
        }

        // Sava info to Database : test -> ?write_type=insert&insert_name=textInsert&content=writeTest&order=2
        public function Write($mysqli, $page, $WriteType, $InsertName, $Content, $Order) {
            echo $page." : ".$WriteType." : ".$InsertName." : ".$Content." : ".$Order;

            $query = "UPDATE `content` SET `order`=`order`+1 WHERE `order` > $Order";
            $mysqli->query($query);

            if($WriteType == "insert")
            $query = "INSERT INTO `content`( `page_name`, `insert_name`, `content`, `order`)
            VALUES ('".$page."', '".$InsertName."', '".$Content."', '".$Order."')";
            $mysqli->query($query);

        }
    
        // Get Page info
        public function Connect($page, $mysqli) {
            
        }
    
        // Build Database if none exist
        private function BuildDB() {
        
        }
    }
?>