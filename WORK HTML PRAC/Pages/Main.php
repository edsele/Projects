<!DOCTYPE html>
<html>
    <head>
        <title>Job List</title>
        <link rel="stylesheet" type="text/css" href="CSS/Main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

        <!-- Toggle Menu Icon -->

        <div class="toggle">
            <ion-icon name="menu-outline" class="open"></ion-icon>
            <ion-icon name="close-outline" class="close"></ion-icon>
        </div>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


        <!--  Create Nav -->

        <div class="navigation">
            <ul>
                <li class="list active">
                    <b></b>
                    <b></b>
                    <a href="Main.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Main Page</span>
                    </a>
                    </li>
                    <li class="list">
                    <b></b>
                    <b></b>
                    <a href="AddJob.php">
                        <span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span>
                        <span class="title">Add Job</span>
                    </a>
                </li>
            </ul>
        </div>



        <!-- Table and Table Heads -->

        <table>
            <thead>
                <tr>
                    <th>Company</th>
                    <th>Job Name</th>
                    <th>Job ID</th>
                    <th>Job Type</th>
                    <th>Job Location</th>
                    <th>Job Link</th>
                </tr>
            </thead>

            <!-- Table Rows with Data -->

            <?php
            include("Data/connection.php");

            $sql = "SELECT * FROM job ORDER BY CompanyName";
            $result = $conn-> query($sql);

            if ($result-> num_rows > 0 )
            {
                while ($row = $result-> fetch_assoc()){
                    echo "
                    <tbody>
                        <tr>
                            
                            <td>". $row["CompanyName"]. "</td>
                            <td>" . $row["JobName"]. "</td>
                            <td>" . $row["JobID"]. "</td>
                            <td>" . $row["JobType"]. "</td>
                            <td>" . $row["JobLocation"]. "</td>
                            <td> <a href='" . $row["JobLink"] . "'>" . $row["JobLink"] . "</a></td>

                        </tr>
                    <tbody>";

                }

            }
            else 
            {
                echo "No results found";
            }

            $conn-> close();

            ?>

        </table>


        <!-- Script for toggling nav -->

        <script>

            let menuToggle = document.querySelector('.toggle');
            let navigation = document.querySelector('.navigation');
            menuToggle.onclick = function(){
            menuToggle.classList.toggle('active');
            navigation.classList.toggle('active');
            }


            // add active class in selected list item
            let list = document.querySelectorAll('.list');
            for (let i = 0; i<list.length; i++){
                list[i].onclick = function(){
                let j = 0;
                while(j < list.length){
                    list[j++].className = 'list';
                }
                list[i].className = 'list active';
                }
            }
        </script>



        <div>
            <button onclick="darkMode()">DARK MODE</button>
        </div>


        <script>
            function darkMode() {
                var element = document.body;
                element.classList.toggle("dark-mode");
            }
        </script>



    </body>
</html>