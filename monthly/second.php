<!DOCTYPE html>
<html>

<head>
    <title>Your Progress</title>
    <link rel="stylesheet" href="second.css">
    <link rel="stylesheet" href="global.css" />

</head>

<body>
    <div class="container">
        <h1>Progress Checker</h1>
        <form method="POST" action="third.php">
            <label for="weight">Weight:</label>
            <input type="number" name="weight" id="weight" required min="40" max="200">

            <label for="goal">Your New Goal:</label>
            <div class="goal-buttons">
                <input type="radio" name="goal" id="goal1" value="1" required>
                <label for="goal1">Build Muscle</label>

                <input type="radio" name="goal" id="goal2" value="2">
                <label for="goal2">Lose Weight</label>

                <input type="radio" name="goal" id="goal3" value="3">
                <label for="goal3">Gain Muscle</label>

                <input type="radio" name="goal" id="goal4" value="4">
                <label for="goal4">Refine and Tone</label>
            </div>
            <input type="submit" value="Get Started With Your New Journey">
        </form>
    </div>
</body>

</html>