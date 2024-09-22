<?php if (!isset($_SESSION)) { session_start(); } ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        
        <title>Train Filling Problem</title>	
        
        <meta name="description" content="Train Filling Problem">
        <meta name="author" content="Nathaniel Webster">

        <!-- Internal styles not linked -->
        <style type="text/css">
            body{
                text-align: center;
                background-image: url(https://i.cbc.ca/1.6275115.1638812772!/fileImage/httpImage/image.jpg_gen/derivatives/16x9_780/pipeline-protest-20201127.jpg);
                background-size: cover;
                background-attachment: fixed;
                font-family: Allerta, "Varela Round", Voltaire, sans-serif;
                font-size: 20px;
                padding: 0;
                margin: 0;
                width: 100%;
                height: 100%;
            }
            * {
                box-sizing: border-box;
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
            }
            /* fluid column layout */
            .fluid1col, .fluid2col, .fluid3col, .fluid23col, .fluid4col, .fluid5col, .fluid6col, .fluid34col {
                padding:  10px 10px;
                position: relative;
                display: inline-block;
                width: 100%;
                float: left;
                -webkit-transition: all 0.5s ease;
                -moz-transition: all 0.5s ease;
                -o-transition: all 0.5s ease;
                transition: all 0.5s ease;	
            }
            @media screen and (min-width: 601px) {
                /* fluid columns */
                .fluid1col {
                    width: 100%;
                }
                .fluid2col {
                    width: 50%;
                }
                .fluid23col {
                    width: 66.666666666666666%;
                }	
                .fluid3col {
                    width: 33.33333333333%;		
                }
                .fluid34col {
                    width: 75%;	
                }	
                .fluid4col {
                    width: 25%;	
                }	
                .fluid5col {
                    width: 20%;
                }
                .fluid6col {
                    width:  16.6666666666%;
                }
            }
            @media screen and (max-width: 600px) {
                /* fluid columns */
                .fluid1col, .fluid2col, .fluid3col, .fluid23col, .fluid4col, .fluid5col, .fluid6col, .fluid34col {
                    width:  100%;
                }
            }
            .clear {
                clear: both;
            }
            #faded-background{
                position: relative;
                display: inline-block;
                border-radius: 0.7em;
                margin-left: auto;
                margin-right: auto;
                width: 1000px;
                padding: 20px;
                background: rgba(179, 128, 255, 0.8);
                border: 10px solid #ff751a; /* the values in order are size, style, color */
            }
            .smallImage {
                border-radius: 0.5em; /* 50% border radius */
                box-shadow: 0px 0px 10px #333333; /* http://www.css3.info/preview/box-shadow/ */
                -moz-box-shadow: 0px 0px 10px #333333;
                -webkit-box-shadow: 0px 0px 10px #333333;
                padding: 5px; 
                background-color: #0099ff;
                width: 100px;
            }
            .normalImage {
                border-radius: 0.5em; /* 50% border radius */
                box-shadow: 0px 0px 10px #333333; /* http://www.css3.info/preview/box-shadow/ */
                -moz-box-shadow: 0px 0px 10px #333333;
                -webkit-box-shadow: 0px 0px 10px #333333;
                padding: 5px; 
                background-color: #0099ff;
                width: 200px;
            }
            .numberInputs{
                font-size: 25px;
                padding: 10px;
                border-radius: 0.4em;
                outline: none;
                width: 90%;
                background: #80dfff;
                color: #0000ff;
                margin-right: auto;
                margin-left: auto;
                margin-bottom: 30px;
            }		
            .buttons {
                background: #0031f7;
                background-image: -webkit-linear-gradient(top, #0031f7, #f01111);
                background-image: -moz-linear-gradient(top, #0031f7, #f01111);
                background-image: -ms-linear-gradient(top, #0031f7, #f01111);
                background-image: -o-linear-gradient(top, #0031f7, #f01111);
                background-image: linear-gradient(to bottom, #0031f7, #f01111);
                -webkit-border-radius: 28;
                -moz-border-radius: 28;
                border-radius: 28px;
                font-family: Arial;
                color: #ffffff;
                font-size: 20px;
                padding: 10px 20px 10px 20px;
                text-decoration: none;
                margin: 10px;
            }

            .buttons:hover {
                background: #2a90fc;
                background-image: -webkit-linear-gradient(top, #2a90fc, #ff2638);
                background-image: -moz-linear-gradient(top, #2a90fc, #ff2638);
                background-image: -ms-linear-gradient(top, #2a90fc, #ff2638);
                background-image: -o-linear-gradient(top, #2a90fc, #ff2638);
                background-image: linear-gradient(to bottom, #2a90fc, #ff2638);
                text-decoration: none;
            }
            .errorText {
                font-size: 25px;
                color: #ff0000;
            }
            /* default link styles */
            a:link, a:visited, a:active {
                color: #333333;
                text-decoration: underline;
            }
            a:hover {
                color: #ffa500;
                text-decoration: underline;
            }
        </style>

        <!-- Link to font-awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <!-- Put a faded background behind all elements -->
        <div id="faded-background">
            <!-- Put content in the middle of the page-->
            <div class="fluid1col">
                <h1>Train Filling Problem</h1>

                <img src="https://ichef.bbci.co.uk/news/976/cpsprodpb/F8A4/production/_101725636__93533041_hi036872703_getty.jpg" class="normalImage">

                <p>Problem: there are an infinite number of trains (three types with maximum capacity of 10, 20 or 30 people) that can arrive at a station. The user must input how many passengers are on the platform and waiting to board. Once the first train is filled (or partially filled) if there are poeple left, another random train must come get them. This takes 2 minutes. The first passenger to load any train takes 2 seconds. Each person after that takes 1% longer to board. Calculate the total number of trains required and total time to load the trains.</p>

                <p></p>

                <!-- Form where the user can enter a number to be square rooted-->
                <form name="Selection form" action="" method="post">
                    <input type="number" name="numOfPassengers" class="numberInputs" placeholder="Enter # of passengers here" value="<?php echo $_POST['numOfPassengers'] ?>"/><br />

                    <input type="submit" name="simulate" value="Simulate!" class="buttons" /><br />
                <hr size="1" />
                </form>

                <?php
                    //Array of the possible capacity sizes
                    $capacitySizes = array(10,20,30);

                    //Changes time unit to minutes or hours if needed to
                    function timeChange ($t) {
                        //Starts unit at seconds
                        $unit = "s";

                        /*If t is greater than 60, divide it by 60 so that it converts into minutes */
                        if ($t >= 60) {
                            $t = round($t / 60, 2);
                            $unit = "min";
                        }
                        
                        /*If t is still greater than 60, then divide it again by 60 so that it converts into hours */
                        if ($t >= 60) {
                            $t = round($t / 60, 2);
                            $unit = "hrs";
                        }

                        //Set up the time text which includes both amount and unit
                        $tMessage = " " . $t . " " . $unit . " ";

                        return $tMessage;
                    }
                    // If the user clicks "Simulate" 
                    if ($_POST['simulate']) {
                        
                        //initialize number of passengers variable
                        $numOfPassengers = $_POST['numOfPassengers'];

                        //Set error to false
                        $error = false;

                        //Error if no numbers are given
                        if ($numOfPassengers  == "") {
                            $error = true;
                            $errorMessage = "<p class='errorText'><i class='fa-solid fa-triangle-exclamation'></i> ERROR: <br />Please enter the number of passengers!</p>";
                            echo " " . $errorMessage . " ";
                        }
                        //Error if number of passengers is equal to or less than 0
                        else if ($numOfPassengers  <= 0) {
                            $error = true;
                            $errorMessage = "<p class='errorText'><i class='fa-solid fa-triangle-exclamation'></i> ERROR: <br />The number of passengers must be greater than 0!</p>";
                            echo " " . $errorMessage . " ";
                        }



                        //If there are no errors
                        if ($error == false) {

                            /* Setting train number to one so that the while loop starts at the first train */ 
                            $numTrain = 1;

                            echo "<h2>There are " . $numOfPassengers . " passengers</h2>";

                            /* While there are still passengers that haven't been loaded on */ 
                            while ($numOfPassengers > 0) {
                                $capacity = $capacitySizes[rand(0, 2)];

                                /* Tells program what to do if the current train will be fully occupied */ 
                                if ($numOfPassengers > $capacity) {
                                    $capacityUsed = $capacity;
                                    $time = $time + 2 + (($capacity - 1) * 2.02);
                                }
                                /* Tells program what to do if the current train will be partially occupied */ 
                                else {
                                    $capacityUsed = $numOfPassengers;
                                    $time = $time + 2 + (($numOfPassengers - 1) * 2.02);
                                }

                                /*Number of passengers decreases by the number of people the train can hold */
                                $numOfPassengers = $numOfPassengers - $capacity;

                                //Prevents number of passengers from being less than 0
                                if ($numOfPassengers < 0) {
                                    $numOfPassengers = 0;
                                }

                                /* Calculates what percentage of the capacity has been occupied */
                                $occupancy = round((($capacityUsed / $capacity) * 100), 2);

                                /* Make sure the time is the right units by using timeChange() function */
                                $totalTime = timeChange($time);

                                //Print all the stats for the current train
                                echo "Train # " . $numTrain . " size: " . $capacity . " | Occupancy: " . $occupancy . " % (" . $capacityUsed . " pepople boarded)| Number left: " . $numOfPassengers . " | Total Time:" . $totalTime . "<br /> ";

                                //Move on to the next train
                                $numTrain = $numTrain + 1;

                                /* Increase time by 2 minutes due to time it takes for another random train to reach boarding area */
                                $time = $time + 120;
        
                            }

                            /* Decrease time by 2 minutes bc the loop will make the final time 2 minutes more than it actually is */
                            $time = $time - 120;

                            echo "<h2>It took " . $numTrain . " trains and a total time of " . $totalTime . "</h2>";

                        }

                    }
                ?>
            </div>
        </div>

    </body>
</html>