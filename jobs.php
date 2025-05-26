<?php
    require_once 'topbar.php';
    require_once 'button.php';
    require_once 'icon.php';
    require_once 'footer.php';
    require_once 'settings.php';
    
    session_start(); 

    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $jobs = [];
    $result = mysqli_query($conn, "SELECT * FROM jobs");
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $jobs[] = [
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
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glow | Careers</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body id="jobs-body">
    <input type="checkbox" id="jobs-toggle" hidden>
    <section id="jobs-wrapper">

        <!-- This section is the default content of the jobs page -->
        <section id="jobs-page">
            <?php
                echo createTopbar(
                    TopbarVariant::SINGULAR, 
                    array(
                        new MenuOption('./styles/images/suitcase_fill.svg', IconSize::Normal, 'Jobs', 'jobs.php'),
                        new MenuOption('./styles/images/folder_open_fill.svg', IconSize::Normal, 'Apply', 'apply.php'),
                        new MenuOption('./styles/images/emoji_fill.svg', IconSize::Normal, 'About', 'about.php')
                    ), 
                    './styles/images/glow-logo.svg', 'Careers'
                )
            ?>
            <section id="discover-wrapper">
                    <div id="discover-contents">
                        <h1>Discover <span class="glow-fancy-text">Glow</span></h1>
                        <h6>Leave your impact on the world</h6>
                        <?php echo createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, '', 'Start now', 'button', '#open-positions-wrapper') ?>
        
                    </div>
                    <div id="glow-fancy-wrapper">
                        <svg id="glow-fancy" viewBox="0 0 1069 665" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M279.683 157.407C279.683 157.407 310.454 85.5425 249.843 61.2982C205.504 43.5625 129.921 58.2425 85.2609 107.922C40.7759 157.407 18.4956 222.477 32.1098 290.921C49.1275 376.475 107.174 444.779 289.706 396.057C289.706 396.057 301.647 287.406 299.111 283.937C294.863 278.127 212.378 278.771 215.575 281.596C218.771 284.421 296.411 279.957 297.932 284.421C299.453 288.885 289.196 404.813 289.196 404.813C278.226 476.932 247.308 642.795 189.732 638.969C124.704 634.647 135.757 531.762 242.11 463.91C348.462 396.057 406.949 377.182 467.758 281.596C517.187 203.898 552.439 128.334 538.418 56.6257C532.631 27.0271 496.581 18.3422 475.523 39.3996C457.897 57.0262 444.694 80.5713 425.678 147.351C392.362 264.345 405.123 395.738 463.689 412.929C524.091 421.58 558.774 310.435 563.787 310.435C568.8 310.435 554.128 414.948 618.63 417.137C670.962 418.914 721.132 360.585 686.367 270.814C672.844 235.896 631.027 223.267 606.618 248.472C586.928 268.804 592.65 288.065 606.618 296.002C648.254 319.66 693.368 329.712 742.872 310.435C790.55 291.87 790.164 248.472 794.505 248.472C798.846 248.472 782.03 414.649 815.884 419.508C832.831 421.94 902.371 252.678 906.785 253.387C911.199 254.096 913.05 427.709 934.048 419.508C960.7 409.098 1034.07 280.929 1042.15 251.282" stroke="#FADCA6" stroke-width="50" stroke-linecap="round"/>
                        </svg> 
                    </div>
                <iframe id ="jobs-effect" src="data:text/html;base64,PGh0bWw+CiAgICAgICAgPGhlYWQ+CiAgICAgICAgICAgIDxtZXRhIG5hbWU9InZpZXdwb3J0IiBjb250ZW50PSJ3aWR0aD1kZXZpY2Utd2lkdGgsIGluaXRpYWwtc2NhbGU9MSI+CiAgICAgICAgICAgIDxzdHlsZT4KICAgICAgICAgICAgICAgIGh0bWwsIGJvZHl7CiAgICAgICAgICAgICAgICAgICAgbWFyZ2luOiAwOwogICAgICAgICAgICAgICAgICAgIHBhZGRpbmc6IDA7CiAgICAgICAgICAgICAgICAgICAgd2lkdGg6IDEwMCU7CiAgICAgICAgICAgICAgICAgICAgaGVpZ2h0OiAxMDAlOwogICAgICAgICAgICAgICAgICAgIGJvcmRlcjogMDsKICAgICAgICAgICAgICAgIH0KICAgICAgICAgICAgPC9zdHlsZT4KICAgICAgICAgICAgPHNjcmlwdCB0eXBlPSJpbXBvcnRtYXAiPgp7CiAgICAiaW1wb3J0cyI6IHsKICAgICAgICAicmVhY3QiOiAiaHR0cHM6Ly9jZG4uc2t5cGFjay5kZXYvcmVhY3RAMTguMC4yIiwKICAgICAgICAicmVhY3QtZG9tIjogImh0dHBzOi8vY2RuLnNreXBhY2suZGV2L3JlYWN0LWRvbUAxOC4wLjIiLAogICAgICAgICJ0aHJlZSI6ICJodHRwczovL2Nkbi5za3lwYWNrLmRldi90aHJlZUAwLjE0OC4wIiwKICAgICAgICAicmVhY3QtdGhyZWUvZmliZXIiOiAiaHR0cHM6Ly9jZG4uc2t5cGFjay5kZXYvQHJlYWN0LXRocmVlL2ZpYmVyQDcuMC4yNCIKICAgIH0KfQo8L3NjcmlwdD4KPHN0eWxlPgogICAgaHRtbCwgYm9keXsKICAgICAgICBtYXJnaW46IDA7CiAgICAgICAgcGFkZGluZzogMDsKICAgICAgICB3aWR0aDogMTAwJTsKICAgICAgICBoZWlnaHQ6IDEwMCU7CiAgICAgICAgYm9yZGVyOiAwOwogICAgfQogICAgLm50LWVtYmVkewogICAgICAgIHdpZHRoOiAxMDAlOwogICAgICAgIGhlaWdodDogMTAwJTsKICAgIH0KICAgIC5udC1lbWJlZCBjYW52YXN7CiAgICAgICAgd2lkdGg6IDEwMCU7CiAgICAgICAgaGVpZ2h0OiAxMDAlOwogICAgfQo8L3N0eWxlPgo8c2NyaXB0IHR5cGU9Im1vZHVsZSI+CiAgICBpbXBvcnQgUmVhY3QsIHt1c2VSZWYsdXNlTWVtb30gZnJvbSAncmVhY3QnOwogICAgaW1wb3J0IFJlYWN0RE9NIGZyb20gJ3JlYWN0LWRvbSc7CiAgICBpbXBvcnQgKiBhcyBUSFJFRSBmcm9tICd0aHJlZSc7CiAgICBpbXBvcnQge0NhbnZhcywgdXNlRnJhbWUsIHVzZVRocmVlfSBmcm9tICdyZWFjdC10aHJlZS9maWJlcic7CgogICAgbGV0IGVtYmVkUm9vdCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2RpdicpOwogICAgZW1iZWRSb290LmNsYXNzTmFtZSA9ICJudC1lbWJlZCI7CiAgICBkb2N1bWVudC5ib2R5LmFwcGVuZENoaWxkKGVtYmVkUm9vdCk7CgogICAgY29uc3QgVGV4dHVyZU1lc2ggPSAoKSA9PiB7CiAgICAgICAgY29uc3QgbWVzaCA9IHVzZVJlZihudWxsKQogICAgICAgIHVzZUZyYW1lKHN0YXRlID0+IHsKICAgICAgICAgICAgY29uc3QgeyBjbG9jaywgbW91c2UsIGdsLCBzY2VuZSwgY2FtZXJhIH0gPSBzdGF0ZQogICAgICAgICAgICBpZihtZXNoLmN1cnJlbnQpewogICAgICAgICAgICAgICAgbWVzaC5jdXJyZW50Lm1hdGVyaWFsLnVuaWZvcm1zLnVfbW91c2UudmFsdWUgPSBbbW91c2UueCAvIDIgKyAwLjUsIG1vdXNlLnkgLyAyICsgMC41XQogICAgICAgICAgICAgICAgbWVzaC5jdXJyZW50Lm1hdGVyaWFsLnVuaWZvcm1zLnVfdGltZS52YWx1ZSA9IGNsb2NrLmdldEVsYXBzZWRUaW1lKCkKICAgICAgICAgICAgICAgIGxldCBjID0gZ2wuZG9tRWxlbWVudC5nZXRCb3VuZGluZ0NsaWVudFJlY3QoKQogICAgICAgICAgICAgICAgbWVzaC5jdXJyZW50Lm1hdGVyaWFsLnVuaWZvcm1zLnVfcmVzb2x1dGlvbi52YWx1ZSA9IFtjLndpZHRoLGMuaGVpZ2h0XQogICAgICAgICAgICB9CiAgICAgICAgfSkKICAgICAgICAKICAgICAgICByZXR1cm4gUmVhY3QuY3JlYXRlRWxlbWVudCgnbWVzaCcsCiAgICAgICAgICAgIHsKICAgICAgICAgICAgICAgIHJlZjptZXNoLAogICAgICAgICAgICAgICAgcG9zaXRpb246IFswLDAsMF0sCiAgICAgICAgICAgICAgICBzY2FsZTogMSwKICAgICAgICAgICAgICAgIHJvdGF0aW9uOiBbMCwwLDBdCiAgICAgICAgICAgIH0sCiAgICAgICAgICAgIFJlYWN0LmNyZWF0ZUVsZW1lbnQoJ3BsYW5lR2VvbWV0cnknLHthcmdzOlsyNDAsNTgwXX0pLCAKICAgICAgICAgICAgUmVhY3QuY3JlYXRlRWxlbWVudCgnc2hhZGVyTWF0ZXJpYWwnLHsKICAgICAgICAgICAgICAgIGZyYWdtZW50U2hhZGVyOiBgLy8gRnJhZ21lbnQgc2hhZGVyCgoKCi8vIFVuaWZvcm1zCgp1bmlmb3JtIHZlYzIgdV9yZXNvbHV0aW9uOwoKdW5pZm9ybSB2ZWMyIHVfbW91c2U7Cgp1bmlmb3JtIGZsb2F0IHVfdGltZTsKCnVuaWZvcm0gdmVjNCB1X2NvbG9yc1s0XTsKCnVuaWZvcm0gZmxvYXQgdV9ibHVyOyAKCnVuaWZvcm0gYm9vbCB1X2FuaW1hdGU7Cgp1bmlmb3JtIGZsb2F0IHVfYW5pbWF0ZV9zcGVlZDsKCnVuaWZvcm0gZmxvYXQgdV9mcmVxdWVuY3k7CgogICAgCgojZGVmaW5lIFMoYSxiLHQpIHNtb290aHN0ZXAoYSxiLHQpCgoKCgoKI2lmbmRlZiBTUkdCX0VQU0lMT04gCiNkZWZpbmUgU1JHQl9FUFNJTE9OIDAuMDAwMDAwMDEKI2VuZGlmCgojaWZuZGVmIEZOQ19TUkdCMlJHQgojZGVmaW5lIEZOQ19TUkdCMlJHQgoKCgoKZmxvYXQgc3JnYjJyZ2IoZmxvYXQgY2hhbm5lbCkgewogICAgcmV0dXJuIChjaGFubmVsIDwgMC4wNDA0NSkgPyBjaGFubmVsICogMC4wNzczOTkzODA4IDogcG93KChjaGFubmVsICsgMC4wNTUpICogMC45NDc4NjcyOTg1NzgxOTksIDIuNCk7Cn0KCnZlYzMgc3JnYjJyZ2IodmVjMyBzcmdiKSB7CiAgICByZXR1cm4gdmVjMyhzcmdiMnJnYihzcmdiLnIgKyBTUkdCX0VQU0lMT04pLCAKICAgICAgICAgICAgICAgIHNyZ2IycmdiKHNyZ2IuZyArIFNSR0JfRVBTSUxPTiksICAgICAgICAgICAgICAgICBzcmdiMnJnYihzcmdiLmIgKyBTUkdCX0VQU0lMT04pKTsKfQoKdmVjNCBzcmdiMnJnYih2ZWM0IHNyZ2IpIHsKICAgIHJldHVybiB2ZWM0KHNyZ2IycmdiKHNyZ2IucmdiKSwgc3JnYi5hKTsKfQoKI2VuZGlmCgoKI2lmICFkZWZpbmVkKEZOQ19TQVRVUkFURSkgJiYgIWRlZmluZWQoc2F0dXJhdGUpCiNkZWZpbmUgRk5DX1NBVFVSQVRFCiNkZWZpbmUgc2F0dXJhdGUoeCkgY2xhbXAoeCwgMC4wLCAxLjApCiNlbmRpZgoKCgojaWZuZGVmIFNSR0JfRVBTSUxPTiAKI2RlZmluZSBTUkdCX0VQU0lMT04gMC4wMDAwMDAwMQojZW5kaWYKCiNpZm5kZWYgRk5DX1JHQjJTUkdCCiNkZWZpbmUgRk5DX1JHQjJTUkdCCgoKZmxvYXQgcmdiMnNyZ2IoZmxvYXQgY2hhbm5lbCkgewogICAgcmV0dXJuIChjaGFubmVsIDwgMC4wMDMxMzA4KSA/IGNoYW5uZWwgKiAxMi45MiA6IDEuMDU1ICogcG93KGNoYW5uZWwsIDAuNDE2NjY2NjY2NjY2NjY2NykgLSAwLjA1NTsKfQoKdmVjMyByZ2Iyc3JnYih2ZWMzIHJnYikgewogICAgcmV0dXJuIHNhdHVyYXRlKHZlYzMocmdiMnNyZ2IocmdiLnIgLSBTUkdCX0VQU0lMT04pLCByZ2Iyc3JnYihyZ2IuZyAtIFNSR0JfRVBTSUxPTiksIHJnYjJzcmdiKHJnYi5iIC0gU1JHQl9FUFNJTE9OKSkpOwp9Cgp2ZWM0IHJnYjJzcmdiKHZlYzQgcmdiKSB7CiAgICByZXR1cm4gdmVjNChyZ2Iyc3JnYihyZ2IucmdiKSwgcmdiLmEpOwp9CgojZW5kaWYKCgoKI2lmbmRlZiBGTkNfTUlYT0tMQUIKI2RlZmluZSBGTkNfTUlYT0tMQUIKdmVjMyBtaXhPa2xhYiggdmVjMyBjb2xBLCB2ZWMzIGNvbEIsIGZsb2F0IGggKSB7CgogICAgI2lmZGVmIE1JWE9LTEFCX0NPTE9SU1BBQ0VfU1JHQgogICAgY29sQSA9IHNyZ2IycmdiKGNvbEEpOwogICAgY29sQiA9IHNyZ2IycmdiKGNvbEIpOwogICAgI2VuZGlmCgogICAgCiAgICBjb25zdCBtYXQzIGtDT05FdG9MTVMgPSBtYXQzKCAgICAgICAgICAgICAgICAKICAgICAgICAgMC40MTIxNjU2MTIwLCAgMC4yMTE4NTkxMDcwLCAgMC4wODgzMDk3OTQ3LAogICAgICAgICAwLjUzNjI3NTIwODAsICAwLjY4MDcxODk1ODQsICAwLjI4MTg0NzQxNzQsCiAgICAgICAgIDAuMDUxNDU3NTY1MywgIDAuMTA3NDA2NTc5MCwgIDAuNjMwMjYxMzYxNik7CiAgICBjb25zdCBtYXQzIGtMTVN0b0NPTkUgPSBtYXQzKAogICAgICAgICA0LjA3NjcyNDUyOTMsIC0xLjI2ODE0Mzc3MzEsIC0wLjAwNDExMTk4ODUsCiAgICAgICAgLTMuMzA3MjE2ODgyNywgIDIuNjA5MzMyMzIzMSwgLTAuNzAzNDc2MzA5OCwKICAgICAgICAgMC4yMzA3NTkwNTQ0LCAtMC4zNDExMzQ0MjkwLCAgMS43MDY4NjI1Njg5KTsKICAgICAgICAgICAgICAgICAgICAKICAgIAogICAgdmVjMyBsbXNBID0gcG93KCBrQ09ORXRvTE1TICogY29sQSwgdmVjMygxLjAvMy4wKSApOwogICAgdmVjMyBsbXNCID0gcG93KCBrQ09ORXRvTE1TICogY29sQiwgdmVjMygxLjAvMy4wKSApOwogICAgCiAgICB2ZWMzIGxtcyA9IG1peCggbG1zQSwgbG1zQiwgaCApOwogICAgCiAgICAKICAgIHZlYzMgcmdiID0ga0xNU3RvQ09ORSoobG1zKmxtcypsbXMpOwoKICAgICNpZmRlZiBNSVhPS0xBQl9DT0xPUlNQQUNFX1NSR0IKICAgIHJldHVybiByZ2Iyc3JnYihyZ2IpOwogICAgI2Vsc2UKICAgIHJldHVybiByZ2I7CiAgICAjZW5kaWYKfQoKdmVjNCBtaXhPa2xhYiggdmVjNCBjb2xBLCB2ZWM0IGNvbEIsIGZsb2F0IGggKSB7CiAgICByZXR1cm4gdmVjNCggbWl4T2tsYWIoY29sQS5yZ2IsIGNvbEIucmdiLCBoKSwgbWl4KGNvbEEuYSwgY29sQi5hLCBoKSApOwp9CiNlbmRpZgoKCgptYXQyIFJvdChmbG9hdCBhKQoKewoKICAgIGZsb2F0IHMgPSBzaW4oYSk7CgogICAgZmxvYXQgYyA9IGNvcyhhKTsKCiAgICByZXR1cm4gbWF0MihjLCAtcywgcywgYyk7Cgp9CgoKCgoKLy8gQ3JlYXRlZCBieSBpbmlnbyBxdWlsZXogLSBpcS8yMDE0CgovLyBMaWNlbnNlIENyZWF0aXZlIENvbW1vbnMgQXR0cmlidXRpb24tTm9uQ29tbWVyY2lhbC1TaGFyZUFsaWtlIDMuMCBVbnBvcnRlZCBMaWNlbnNlLgoKdmVjMiBoYXNoKCB2ZWMyIHAgKQoKewoKICAgIHAgPSB2ZWMyKCBkb3QocCx2ZWMyKDIxMjcuMSw4MS4xNykpLCBkb3QocCx2ZWMyKDEyNjkuNSwyODMuMzcpKSApOwoKCXJldHVybiBmcmFjdChzaW4ocCkqNDM3NTguNTQ1Myk7Cgp9CgoKCmZsb2F0IG5vaXNlKCBpbiB2ZWMyIHAgKQoKewoKICAgIHZlYzIgaSA9IGZsb29yKCBwICk7CgogICAgdmVjMiBmID0gZnJhY3QoIHAgKTsKCgkKCgl2ZWMyIHUgPSBmKmYqKDMuMC0yLjAqZik7CgoKCiAgICBmbG9hdCBuID0gbWl4KCBtaXgoIGRvdCggLTEuMCsyLjAqaGFzaCggaSArIHZlYzIoMC4wLDAuMCkgKSwgZiAtIHZlYzIoMC4wLDAuMCkgKSwgCgogICAgICAgICAgICAgICAgICAgICAgICBkb3QoIC0xLjArMi4wKmhhc2goIGkgKyB2ZWMyKDEuMCwwLjApICksIGYgLSB2ZWMyKDEuMCwwLjApICksIHUueCksCgogICAgICAgICAgICAgICAgICAgbWl4KCBkb3QoIC0xLjArMi4wKmhhc2goIGkgKyB2ZWMyKDAuMCwxLjApICksIGYgLSB2ZWMyKDAuMCwxLjApICksIAoKICAgICAgICAgICAgICAgICAgICAgICAgZG90KCAtMS4wKzIuMCpoYXNoKCBpICsgdmVjMigxLjAsMS4wKSApLCBmIC0gdmVjMigxLjAsMS4wKSApLCB1LngpLCB1LnkpOwoKCXJldHVybiAwLjUgKyAwLjUqbjsKCn0KCgoKdm9pZCBtYWluKCl7CgogIAoKICAgIHZlYzIgdXYgPSBnbF9GcmFnQ29vcmQueHkvdV9yZXNvbHV0aW9uLnh5OwoKICAgIGZsb2F0IHJhdGlvID0gdV9yZXNvbHV0aW9uLnggLyB1X3Jlc29sdXRpb24ueTsKCgoKICAgIHZlYzIgdHV2ID0gdXY7CgogICAgdHV2IC09IC41OwoKICAgIAoKICAgIC8vYW5pbWF0aW9uCgogICAgZmxvYXQgc3BlZWQgPSB1X3RpbWUgKiAxMC4gKiB1X2FuaW1hdGVfc3BlZWQ7CgogICAgaWYodV9hbmltYXRlID09IGZhbHNlKXsKCiAgICAgIHNwZWVkID0gMC4wOwoKICAgIH0KCgoKICAgIC8vIHJvdGF0ZSB3aXRoIE5vaXNlCgogICAgZmxvYXQgZGVncmVlID0gbm9pc2UodmVjMihzcGVlZC8xMDAuMCwgdHV2LngqdHV2LnkpKTsKCgoKICAgIHR1di55ICo9IDEuL3JhdGlvOwoKICAgIHR1diAqPSBSb3QocmFkaWFucygoZGVncmVlLS41KSo3MjAuKzE4MC4pKTsKCgl0dXYueSAqPSByYXRpbzsKCiAgICAKCiAgICAvLyBXYXZlIHdhcnAgd2l0aCBzaW4KCiAgICBmbG9hdCBmcmVxdWVuY3kgPSAyMC4gKiB1X2ZyZXF1ZW5jeTsKCiAgICBmbG9hdCBhbXBsaXR1ZGUgPSAzMC4gKiAoMTAuKigwLjAxK3VfYmx1cikpOwoKICAgIAoKICAgIHR1di54ICs9IHNpbih0dXYueSpmcmVxdWVuY3krc3BlZWQpL2FtcGxpdHVkZTsKCiAgIAl0dXYueSArPSBzaW4odHV2LngqZnJlcXVlbmN5KjEuNStzcGVlZCkvKGFtcGxpdHVkZSouNSk7CgogICAgCgogICAgCgogICAgLy8gZHJhdyB0aGUgaW1hZ2UKCiAgICB2ZWM0IGxheWVyMSA9IG1peE9rbGFiKHVfY29sb3JzWzBdLCB1X2NvbG9yc1sxXSwgUygtLjMsIC4yLCAodHV2KlJvdChyYWRpYW5zKC01LikpKS54KSk7CgogICAgdmVjNCBsYXllcjIgPSBtaXhPa2xhYih1X2NvbG9yc1syXSwgdV9jb2xvcnNbM10sIFMoLS4zLCAuMiwgKHR1dipSb3QocmFkaWFucygtNS4pKSkueCkpOwoKICAgIAoKICAgIHZlYzQgZmluYWxDb21wID0gbWl4T2tsYWIobGF5ZXIxLCBsYXllcjIsIFMoLjUsIC0uMywgdHV2LnkpKTsKCiAgICAKCiAgICAKCiAgICBnbF9GcmFnQ29sb3IgPSBmaW5hbENvbXA7CgogICAgCgp9CgpgLAogICAgICAgICAgICAgICAgdmVydGV4U2hhZGVyOiBgLy8gVmVydGV4IHNoYWRlcgoKdm9pZCBtYWluKCkgewogIGdsX1Bvc2l0aW9uID0gcHJvamVjdGlvbk1hdHJpeCAqIG1vZGVsVmlld01hdHJpeCAqIHZlYzQocG9zaXRpb24sIDEuMCk7Cn1gLAogICAgICAgICAgICAgICAgdW5pZm9ybXM6IHt1X2NvbG9yczoge3ZhbHVlOiBbbmV3IFRIUkVFLlZlY3RvcjQoMC45ODgyMzUyOTQxMTc2NDcxLDAuOTMzMzMzMzMzMzMzMzMzMywwLjgzOTIxNTY4NjI3NDUwOTgsMSksbmV3IFRIUkVFLlZlY3RvcjQoMC45ODgyMzUyOTQxMTc2NDcxLDAuOTMzMzMzMzMzMzMzMzMzMywwLjgzOTIxNTY4NjI3NDUwOTgsMSksbmV3IFRIUkVFLlZlY3RvcjQoMC45NDExNzY0NzA1ODgyMzUzLDAuNjM1Mjk0MTE3NjQ3MDU4OCwwLjA3ODQzMTM3MjU0OTAxOTYsMSksbmV3IFRIUkVFLlZlY3RvcjQoMC45NDExNzY0NzA1ODgyMzUzLDAuNjM1Mjk0MTE3NjQ3MDU4OCwwLjA3ODQzMTM3MjU0OTAxOTYsMSldfSx1X2JsdXI6IHt2YWx1ZTogMC4wNX0sdV9hbmltYXRlOiB7dmFsdWU6IHRydWV9LHVfYW5pbWF0ZV9zcGVlZDoge3ZhbHVlOiAwLjR9LHVfZnJlcXVlbmN5OiB7dmFsdWU6IDAuNX0sdV90aW1lOiB7dmFsdWU6IDB9LHVfbW91c2U6IHt2YWx1ZTogWzAsMF19LHVfcmVzb2x1dGlvbjoge3ZhbHVlOiBbMjQwLDU4MF19fSwKICAgICAgICAgICAgICAgIHdpcmVmcmFtZTogZmFsc2UsIAogICAgICAgICAgICAgICAgd2lyZWZyYW1lTGluZXdpZHRoOiAwLAogICAgICAgICAgICAgICAgZGl0aGVyaW5nOiBmYWxzZSwKICAgICAgICAgICAgICAgIGZsYXRTaGFkaW5nOiB0cnVlLAogICAgICAgICAgICAgICAgZG91YmxlU2lkZWQ6IHRydWUsCiAgICAgICAgICAgICAgICBnbHNsVmVyc2lvbjogIjEwMCIKICAgICAgICAgICAgfSkKICAgICAgICApOyAgCiAgICB9CgogICAgUmVhY3RET00ucmVuZGVyKFJlYWN0LmNyZWF0ZUVsZW1lbnQoQ2FudmFzLHsKICAgICAgICAgICAgZ2w6IHsKICAgICAgICAgICAgICAgIHByZXNlcnZlRHJhd2luZ0J1ZmZlcjogdHJ1ZSwKICAgICAgICAgICAgICAgIHByZW11bHRpcGxpZWRBbHBoYTogZmFsc2UsCiAgICAgICAgICAgICAgICBhbHBoYTogdHJ1ZSwKICAgICAgICAgICAgICAgIHRyYW5zcGFyZW50OiB0cnVlLAogICAgICAgICAgICAgICAgYW50aWFsaWFzOiB0cnVlLAogICAgICAgICAgICAgICAgcHJlY2lzaW9uOiAiaGlnaHAiLAogICAgICAgICAgICAgICAgcG93ZXJQcmVmZXJlbmNlOiAiaGlnaC1wZXJmb3JtYW5jZSIKICAgICAgICAgICAgfSwKICAgICAgICAgICAgcmVzaXplOnsKICAgICAgICAgICAgICAgIGRlYm91bmNlOiAwLAogICAgICAgICAgICAgICAgc2Nyb2xsOiBmYWxzZSwKICAgICAgICAgICAgICAgIG9mZnNldFNpemU6IHRydWUKICAgICAgICAgICAgfSwKICAgICAgICAgICAgZHByOiAxLAogICAgICAgICAgICBjYW1lcmE6IHsKICAgICAgICAgICAgICAgIGZvdjogNzUsCiAgICAgICAgICAgICAgICBuZWFyOiAwLjEsCiAgICAgICAgICAgICAgICBmYXI6IDEwMDAsCiAgICAgICAgICAgICAgICBwb3NpdGlvbjogWzAsMCw1XQogICAgICAgICAgICB9LAogICAgICAgICAgICBzdHlsZTp7IGhlaWdodDogIjEwMCUiLCB3aWR0aDogIjEwMCUiIH0KICAgICAgICB9LAogICAgICAgIFJlYWN0LmNyZWF0ZUVsZW1lbnQoVGV4dHVyZU1lc2gpICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICApLCBlbWJlZFJvb3QpOwo8L3NjcmlwdD4KICAgICAgICA8L2hlYWQ+CiAgICAgICAgPGJvZHk+CjwhLS0gQVNTRVQgTk9UIElOTElORUQ6IGFzc2V0cy9ib29rLjVmYjExYjhkLnN2ZyAtLT4KCjwhLS0gQVNTRVQgTk9UIElOTElORUQ6IGFzc2V0cy9seWdpYS5mNzQ5MDU5NC5zdmcgLS0+Cgo8IS0tIEFTU0VUIE5PVCBJTkxJTkVEOiBhc3NldHMvb3ZlcmZsb3cuOGQ1MDQxNWQuc3ZnIC0tPgoKPCEtLSBBU1NFVCBOT1QgSU5MSU5FRDogYXNzZXRzL3RyYXNoLjUyNGRiY2QzLnN2ZyAtLT4KCjwhLS0gQVNTRVQgTk9UIElOTElORUQ6IGFzc2V0cy92ZXJ0aWNhbC45MDYxMDg0OS5zdmcgLS0+Cgo8IS0tIEFTU0VUIE5PVCBJTkxJTkVEOiBhc3NldHMvaG9yaXpvbnRhbC40NGY3NzFmOC5zdmcgLS0+Cgo8IS0tIEFTU0VUIE5PVCBJTkxJTkVEOiBhc3NldHMvYWRkLmE1NTI0MGRkLnN2ZyAtLT4KCjwhLS0gQVNTRVQgTk9UIElOTElORUQ6IGFzc2V0cy9zaWcuODUwYTg1ZTcuc3ZnIC0tPgoKPCEtLSBBU1NFVCBOT1QgSU5MSU5FRDogYXNzZXRzL21pbnVzLjFlMWEwYWJkLnN2ZyAtLT4KCjwhLS0gQVNTRVQgTk9UIElOTElORUQ6IGFzc2V0cy9lZmZlY3QuNDU1NzI0M2Yuc3ZnIC0tPgoKPCEtLSBBU1NFVCBOT1QgSU5MSU5FRDogYXNzZXRzL3Zpc2libGUuYzZkNGUxYzAuc3ZnIC0tPgoKPCEtLSBBU1NFVCBOT1QgSU5MSU5FRDogYXNzZXRzL2hpZGRlbi41YTRmYzI1NC5zdmcgLS0+Cgo8IS0tIEFTU0VUIE5PVCBJTkxJTkVEOiBhc3NldHMvd29ya2VyLmI3NjFmYjExLmpzIC0tPgo8L2JvZHk+CiAgICAgICAgPC9odG1sPg=="></iframe>
            </section>

            <section id="open-positions-wrapper">
                <div id="open-positions">

                    <div id="open-positions-header">
                        <h3>Open Positions</h3>
                        <?php
                            $jobPositionCount = mysqli_num_rows($result);
                            echo "<aside>Discover $jobPositionCount job positions <br> that we are offering.</aside>"
                        ?>
                    </div>
                    
                    
                  <?php
                    foreach ($jobs as $job) {
                        $color = trim(strtolower($job['color']));
                        $jobIcon = $job['icon'];
                        echo "<form action='update-jobs.php' method='post'>", 
                            "<div class='job-position $color'>",
                            "<div class='job-position-left $color'>",
                                createIcon("$jobIcon", IconSize::Large),
                                "<h5>{$job['title']}</h5>",
                            "</div>",
                            "<div class='job-position-right'>",
                                "<p>{$job['reference']}</p>",
                                
                                // We need a hidden input in order to keep track of the job reference :)
                                "<input type='hidden' name='reference' value='{$job['reference']}'>",

                                "<label for='jobs-toggle'>",
                                    createButton(ButtonSize::Large, ButtonVariant::Filled, ButtonColor::Amber, '', 'Explore', 'submit', ''),
                                "</label>",
                            "</div>",
                            "</div>",
                            "</form>";
                    }
                    ?>

            </section>

            <?php echo createFooter() ?>

        </section>

        <!-- This section appears when the user clicks on a job -->
        <section id="overview-page">
            <label for="jobs-toggle">
                <div class="topbar-go-back">
                    <?php echo createButton(ButtonSize::Normal, ButtonVariant::Shaded, ButtonColor::Grey, './styles/images/left_line.svg', 'Go back', 'button', '#jobs-page') ?>
                </div>
            </label>
            <div id="overview-header-wrapper">
    
                <!-- Make sure the img does not go outside where it shouldn't (that's why there is a wrapper here) -->
                <div id="job-background-wrapper">
                    <?php
                        $jobBackground = $_SESSION['job']['background'];
                        echo "<img src='$jobBackground'>";
                        ?>
                        <?php
                            $jobIcon = $_SESSION['job']['background'];
                            echo createIcon("$jobIcon", IconSize::Large)
                        ?>
                </div>
            </div>
    
            <div id="overview-topbar">
                <?php
                    $jobTitle = $_SESSION['job']['title'];
                    echo "<h5>$jobTitle</h5>";
                ?>
                <div>
                    <?php
                        $jobRef = $_SESSION['job']['reference'];
                        echo "<p>$jobRef</p>";
                        
                        echo createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, '', 'Apply', 'button', 'apply.php');
                    ?> 
                </div>
            </div>
            
            <div id="overview-contents-wrapper">
                <div>
                    <div class="overview-icon-header">
                        <?php echo createIcon('./styles/images/eye_fill.svg', IconSize::Large); ?> 
                        <h5>Overview</h5>
                    </div>

                    <?php
                        $jobOverview = $_SESSION['job']['overview'];
                        echo "<p>$jobOverview</p>";
                    ?>
                </div>
    
                <div>
                    <div class="overview-icon-header">
                        <?php echo createIcon('./styles/images/sparkles_2_fill.svg', IconSize::Large); ?> 
                        <h5>Salary and Benefits</h5>
                    </div>

                    <?php
                        $jobBenefits = $_SESSION['job']['benefits'];
                        echo "<p>$jobBenefits</p>";
                    ?>
                </div>
    
                <div>
                    <div class="overview-icon-header">
                        <?php echo createIcon('./styles/images/inbox_2_fill.svg', IconSize::Large); ?> 
                        <h5>Reporting Structure</h5>
                    </div>
    
                    <?php
                        $jobStructure = $_SESSION['job']['structure'];
                        echo "<p>$jobStructure</p>";
                    ?>
                </div>
    
                <div>
                    <div class="overview-icon-header">
                        <?php echo createIcon('./styles/images/task_2_fill.svg', IconSize::Large); ?> 
                        <h5>Responsibilities</h5>
                    </div>
    
                <?php
                    $stringList = explode('•', $_SESSION['job']['responsibilities']);

                    echo "<ul>";
                    
                    foreach ($stringList as $str) {
                        $trimmedString = trim($str);
                        if ($trimmedString !== '') {
                            echo "<li>$trimmedString</li>";
                        }
                    }

                    echo "</ul>";
                ?>
                </div>
    
                <div>
                    <div class="overview-icon-header">
                        <?php echo createIcon('./styles/images/check_circle_fill.svg', IconSize::Large); ?> 
                        <h5>Requirements</h5>
                    </div>
    
                    <?php
                        $stringList = explode('•', $_SESSION['job']['requirements']);

                        echo "<ol>";
                        
                        foreach ($stringList as $str) {
                            $trimmedString = trim($str);
                            if ($trimmedString !== '') {
                                echo "<li>$trimmedString</li>";
                            }
                        }

                        echo "</ol>";
                    ?>
                </div>
    
                <div id="overview-bottom">
                    <div>
                        <h4>We are waiting for you 😎</h4>
                        <?php echo createButton(ButtonSize::Large, ButtonVariant::Filled, ButtonColor::Amber, '', 'Appply now', 'button', 'apply.php')?>
                    </div>
                </div>
        </section>
    </section>
</body>
</html>