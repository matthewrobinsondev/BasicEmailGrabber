<!DOCTYPE html>
 <html>
 <head>
 	<title>Email Grabber</title>
 </head>
 <body>
 	<form method="post"> <!-- Create a post method form to be used later on-->
 		When entering the URL please include https:// <br>

 		<input type="text" name="input_url" size="65" placeholder="please enter the url..." /> <br> <!-- Create the URL input with a clear placeholder-->

 		Enter example information below, this will prove the ability to parse the data: <br>

 		<textarea name="text" rows="20" cols="80" placeholder="Enter the data that you would like to be parsed in this text area" ></textarea> <!-- Create a text area with rows and columns set -->
 		<br>
 		<input type="submit" name="Retrieve_Emails"> <!-- Name the input as required in PHP -->
 		<br>
 	</form>
 	<H1>Results shown below</H1><br><br>

 	<?php 

 	$request_url= isset($_REQUEST['input_url']) ? htmlspecialchars($_REQUEST['input_url']) : ''; // Request the URL from the input

if(isset($_POST['Retrieve_Emails'])){ // If retreive emails is entered

 	 			if (isset($_REQUEST['input_url']) && !empty($_REQUEST['input_url'])) { // If a URL has been entered within the Input
 				//retrieve data from url inputted
 				$text = file_get_contents($_REQUEST['input_url']);

 			} elseif(isset($_REQUEST['text']) &&!empty($_REQUEST['text'])){ // If data has been entered into the text field

 				//retreive text from text area 
 				$text = $_REQUEST['text'];
 			}
 
 			if (!empty($text)) { // If the text variable is not responding empty
 				$res = preg_match_all('#[A-Z0-9a-z._%+-]+@[A-Za-z0-9.+-]+#', $text, $matches); // Parse through the contents of the site to searc for the @ symbol with characters either side
 			}

 			if ($res) { // Using the data that has been passed through the Preg_Match_All command
 				# code...
 				foreach (array_unique($matches[0]) as $email) { // Return any email matches 
 					echo $email. "<br/>"; //Echo the retrieved emails and return a line break
 					
 				}
 			} else {
 				echo "No emails found"; // Return no emails found
 			}
    }
 	 ?>

 </body>
 </html>

 
