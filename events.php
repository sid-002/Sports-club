<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: lightgray;
            text-align: center;
        }
        header {
            background: navy;
            color: white;
            padding: 15px;
        }
        nav ul {
            list-style: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        .events-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .event-box {
            background: white;
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
            width: 30%;
            text-align: center;
            box-shadow: 0px 4px 8px gray;
        }
        .event-box img {
            width: 100%;
            height: 500px;
            width: 600px;
            border-radius: 10px;
        }
        .form-container {
            background: white;
            padding: 20px;
            margin: 30px auto;
            width: 50%;
            border-radius: 10px;
            box-shadow: 0px 4px 8px gray;
        }
        input, select, button {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid gray;
        }
        button {
            background: orange;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background: darkorange;
        }
    </style>
</head>

<body>
    <header>
        <h1>Upcoming Events</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h2>Available Events</h2>
        <div class="events-container">
            <div class="event-box">
                <img src="images/football.jpg" alt="Football Tournament">
                <h3>Football Tournament</h3>
                <p>Compete with the best teams and showcase your football skills. Register now!</p>
            </div>
            <div class="event-box">
                <img src="images/basketball.jpg" alt="Basketball Championship">
                <h3>Basketball Championship</h3>
                <p>Join the ultimate basketball showdown and win exciting prizes.</p>
            </div>
            <div class="event-box">
                <img src="images/marathon.jpeg" alt="Marathon Race">
                <h3>Marathon Race</h3>
                <p>Push your limits in our thrilling marathon race. Sign up today!</p>
            </div>
        </div>
    </section>

    <section>
        <h2>Register for an Event</h2>
        <div class="form-container">
            <form action="events.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="event">Choose Event:</label>
                <select id="event" name="event" required>
                    <option value="football">Football Tournament</option>
                    <option value="basketball">Basketball Championship</option>
                    <option value="marathon">Marathon Race</option>
                </select>

                <button type="submit" name="submit">Register</button>
            </form>
        </div>

        <?php
        include("database.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $event = filter_input(INPUT_POST, 'event', FILTER_SANITIZE_STRING);

            if (!empty($name) && !empty($email) && !empty($event)) {
                $sql = "INSERT INTO registrations (name, email, event) VALUES ('$name', '$email', '$event')";
                if ($conn->query($sql) === TRUE) {
                    echo "<p style='color:green; font-weight:bold;'>Registration successful!</p>";
                } else {
                    echo "<p style='color:red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }
            } else {
                echo "<p style='color:red;'>All fields are required!</p>";
            }
        }

        mysqli_close($conn);
        ?>
    </section>
</body>

</html>
