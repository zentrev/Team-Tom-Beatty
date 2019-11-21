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
        public function Display_admin($page, $mysqli) {


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
                $order = 0;
                include "adminOptions.php";
                while($row = $result->fetch_assoc())
                {
                    extract($row);
                    include "inserts/".$insert_name.".php";
                    include "adminOptions.php";
                }
            }


        }

        // Sava info to Database : test -> ?write_type=insert&insert_name=textInsert&content=writeTest&order=2
        public function Write($mysqli, $page, $WriteType, $InsertName, $Content, $Order, $id) {
            echo $page." : ".$WriteType." : ".$InsertName." : ".$Content." : ".$Order;

            if($WriteType == "insert")
            {
                $query = "UPDATE `content` SET `order`=`order`+1 WHERE `order` >= $Order AND `page` = $page";
                $mysqli->query($query);

                
                $query = "INSERT INTO `content`( `page_name`, `insert_name`, `content`, `order`)
                VALUES ('".$page."', '".$InsertName."', '".$Content."', '".$Order."')";
                $mysqli->query($query);
            }

            if($WriteType == "update")
            {
                echo "update";
                $id_thing = $id;
                echo "UPDATE `content` SET `insert_name`='$InsertName',`content`='$Content',`order`= $Order WHERE `id`=$id_thing";
                $query = "UPDATE `content` SET `insert_name`='$InsertName',`content`='$Content',`order`= $Order WHERE `id`=$id_thing";
                $mysqli->query($query);
            }

            if($WriteType == "destory")
            {
                echo "destoyr";
                $query = "DELETE FROM `content` WHERE `order` = $Order AND `page_name` = '$page'";
                $mysqli->query($query);
            }

            header("Location: index");

        }
    
        // Get Page info
        public function Connect($page, $mysqli) {
            
        }
    
        // Build Database if none exist
        private function BuildDB() {
        
        }
    }
?>