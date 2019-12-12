<?php

/*
Warning
This function should not be used to try to prevent XSS attacks. Use more appropiate functions like htmlspecialchars() or other means depending on the context of the output.
*/

    class HtmlNormalizer{

        public function __construct() { }
        public function __destruct() { }
        
        private $value;

        private function _strip_tags($allowable_tags){
            if(isset($allowable_tags) && !empty($allowable_tags)){
                $this->value = strip_tags($this->value, $allowable_tags); 
            }
            else{
                $this->value = strip_tags($this->value); 
            }
        }
 
        private function _remove_slashes(){
            /* 
                Example 

                $text="My dog don\\\\\\\\\\\\\\\\'t like the postman!";
                echo removeslashes($text);

                RESULT: My dog don't like the postman!
            */

            $temp = implode("", explode("\\", $this->value));
            $this->value = stripslashes(trim($temp));
        }

        private function _htmlspecialchars(){
            /*
                ENT_COMPAT	Will convert double-quotes and leave single-quotes alone.
                ENT_QUOTES	Will convert both double and single quotes.
                ENT_NOQUOTES	Will leave both double and single quotes unconverted.
            */
            $this->value = htmlspecialchars($this->value, ENT_QUOTES);  // Converts both double and single quotes
            return $this;
        }

        //Take raw HTML as input
        public function HTML($raw_html){
            $this->value = $raw_html;
            return $this;
        }
           
        //Take raw HTML directly from HTTP Post request
        public function HttpPost($http_post_field_name){
            $this->value = $_POST[$http_post_field_name];
            return $this;
        }

        //Take raw HTML directly from HTTP Get request
        public function HttpGet($http_get_field_name){
            $this->value = $_GET[$http_get_field_name];
            return $this;
        }

        //Strip HTML and PHP tags from a string. (PHP 4, PHP 5, PHP 7)
        public function RemoveTags($allowable_tags = null){
            $this->_strip_tags($allowable_tags); 
            return $this;
        }

        //Remove the backslash.
        //The function stripslashes() will unescape characters that are escaped with a backslash, \.
        //This function removes backslashes in a string.
        //stripslashes("how\'s going on?") = how's going on?
        public function RemoveBackslash(){
            $this->_remove_slashes(); 
            return $this;
        }

        /*
            htmlentities — Convert all applicable characters to HTML entities.
            htmlspecialchars — Convert special characters to HTML entities.
            Source- https://stackoverflow.com/questions/46483/htmlentities-vs-htmlspecialchars/3614344
        */
        
        /*
            Convert special characters to HTML entities
            --------------------------example ----------------------------
            $new = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
            echo $new; // &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;
            ---------------------------------------------------------------
        */
        public function Convert(){
            /*
                ENT_COMPAT	Will convert double-quotes and leave single-quotes alone.
                ENT_QUOTES	Will convert both double and single quotes.
                ENT_NOQUOTES	Will leave both double and single quotes unconverted.
            */
            $this->_htmlspecialchars($this->value, ENT_QUOTES);  // Converts both double and single quotes
            return $this;
        }

        //Execute strip_tags(), stripslashes(), htmlspecialchars() in one function -
        public function NormalizeAll(){
            $this->_strip_tags(null);
            $this->_remove_slashes(); 
            $this->_htmlspecialchars(); 
            $value =  $this->value; 
            unset($this->value);
            return $value;
        }

        public function Normalize(){
            $value =  $this->value; 
            unset($this->value);
            return $value;
        }

        // Convert HTML entities to their corresponding characters
        public function Decode($encoded_string) {
            //PHP 4 >= 4.3.0, PHP 5, PHP 7)
            return html_entity_decode($encoded_string);
        }

    } //<--class
?>