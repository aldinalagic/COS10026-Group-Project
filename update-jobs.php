<?php
    require_once 'settings.php';

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo "❌ Invalid request.";
        exit();
    }

    $reference = $_POST['reference'];

    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $result = mysqli_query($conn, "SELECT * FROM jobs WHERE JobReferenceNumber = '$reference'");

    $job = null;
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $job = [
            'reference' => $row['JobReferenceNumber'],
            'title' => $row['JobTitle'],
            'overview' => $row['JobDescriptionOverview'],
            'benefits' => $row['JobDescriptionBenefits'],
            'structure' => $row['JobDescriptionStructure'],
            'responsibilities' => $row['JobDescriptionResponsibilities'],
            'requirements' => $row['JobDescriptionRequirements'],
            'icon' => $row['IconPath'],
            'color' => $row['Color'],
            'background' => $row['BackgroundSVG']
        ];
    }

    mysqli_close($conn);

    session_start();
    $_SESSION['job'] = $job;

    header("Location: jobs.php#overview-page");
    exit;