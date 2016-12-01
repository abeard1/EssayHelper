<?php
include "top.php";

    //Initialize array
    print "<p>Post Array:</p><pre>";
    print_r($_POST);
    print "</pre>";

//for security
$thisURL = $domain . $phpSelf;

//TEST

// When form is submitted:
if (isset($_POST["btnSubmit"])) {



    // security:
    if (!securityCheck($thisURL)) {
            $msg = "<p>Sorry you cannot access this page. ";
            $msg.= "Security breach detected and reported.</p>";
            die($msg);
        }   

    //clean data
    $_Post[txtEssay] = filter_var($_POST["txtEssay"], FILTER_SANITIZE_EMAIL);     


    } //end form is valid
    

// Display form
?>
<article id="main">
    
    <?php
    
    // Display form
    
    if (isset($_POST["btnSubmit"])) { // closing of if marked with: end body submit 

            //May use later - for now, will try to build up from array of characters
            
            //parsed to array of words
            //$strippedEssay = preg_replace('/[^\w\ _]+/', ' ', $_POST[txtEssay]);
            //$essayWords = preg_split("/\s+/", $strippedEssay);
            
            //Split into words (keep delimiters - for reprinting at end)
            $essayWordsRePrint = preg_split('/\s+|\b(?=[!\?\.])(?!\.\s+)/', $_POST[txtEssay]);
            
            //print array of words with delimiters
            print "<p>Words Array (with delimiters):</p><pre>";
            print_r($essayWordsRePrint);
            print "</pre>";
            
            //Split into JUST words and apostrophes - for lookup of words
            $essayWords = array();
            $essayWords = $essayWordsRePrint;
            
            foreach ($essayWords as &$element) {
                $element = preg_replace("/[^'\w]/", "", $element);
            }
            
            //print array of just words
            print "<p>Words Array:</p><pre>";
            print_r($essayWords);
            print "</pre>";
            
            //test commit
  
            
            //parsed to array of sentences (don't need to keep delimiters - always .)
            //$essaySentences = preg_split('/\.[^\d]/', $_POST[txtEssay]);
            $essaySentences = explode(".", $_POST[txtEssay]);
            
            //delete last element in array (always blank)
            unset($essaySentences[count($essaySentences) - 1]);
            
            //delete period from last sentence:
            //$essaySentences[count($essaySentences) - 1] = preg_replace('/[.,]/', '', $essaySentences[count($essaySentences) - 1]);
 


            //print array of sentences
            print "<p>Sentences Array:</p><pre>";
            print_r($essaySentences);
            print "</pre>";
        
            //reprint sentences (highlighting run on sentences)
            foreach($essaySentences as $sentence ) {
                
                //count whitespaces
                $spaces_count = substr_count($sentence, ' ');
                
                //if whitespaces <= 3 (first def of a fragment sentence) - HIGHLIGHT
                $min_spaces = 3;
                $max_spaces =7; 
                
                print '<span ';
                if($spaces_count <= $min_spaces) 
                    print 'class="fragment"';
                if($spaces_count >= $max_spaces) 
                    print 'class="runon"';
                print '>';
                
                
                print $sentence;
                print". ";
                
                print '</span>';
                

		}
            
            
            //$essayChars = str_split($_POST[txtEssay]);
            //print "<p>Chars Array:</p><pre>";
            //print_r($essayChars);
            //print "</pre>";
            
    
        
    } else {
    
 
     
        //WILL USE THIS LATER
        /* 
        Display HTML form - action is to same page -> $phpSelf (defined in top)

        Note line:
        value="<?php print $email; ?>
        displays default or value they've typed in

        Note line:
        <?php if($emailERROR) print 'class="mistake"'; ?>
        this prints out a css class to highlight mistake (easier for them to fix)
        */
     
    //Form inputs (just textarea right now)
    ?>
    <form action="<?php print $phpSelf; ?>"
          id="frmRegister"
          method="post">
                <fieldset class="contact">
                    <legend>Paste your Essay here:</legend>
                    
                    
                    
                    
                    
                    
                    
                 
                    <label class="required" for="txtEssay">
                        <textarea 
                               
                               id="txtEssay"
                    
                               name="txtEssay"
                               onfocus="this.select()"
                               rows="30"
                               cols="50"
                               type="text"
                               
                        >
                    </textarea>
                </fieldset> <!-- ends contact -->
            <fieldset class="buttons">
                <legend></legend>
                <input class="button" id="btnSubmit" name="btnSubmit" tabindex="900" type="submit" value="Submit" >
            </fieldset> <!-- ends buttons -->
    </form>
     
    <?php 

    
    } // end body submit
    ?>    
    
</article>
<?php include "footer.php";?>
</body>
</html>
