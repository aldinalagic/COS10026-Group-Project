<?php
    require_once 'topbar.php';
    require_once 'input.php';
    require_once 'button.php';
    require_once 'checkbox.php';
    require_once 'radio.php';
    require_once 'settings.php';

    $jobs=[];
    $query = "SELECT * FROM jobs";
    $result = mysqli_query($conn, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $jobs[] = [
                'jobid' => $row['JobReferenceNumber']
            ];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"> 
    <meta name="description" content="Job application page"> 
    <meta name="keywords" content="Website, apply"> 
    <meta name="author" content="group">
    <title>Glow | Apply</title>
    <link href="styles/style.css" rel="stylesheet">
</head>
<body class="apply-body">
    <?php
        echo createTopbar(
            TopbarVariant::SINGULAR, 
            array(
                new MenuOption('./styles/images/suitcase_fill.svg', IconSize::Normal, 'Jobs', 'jobs.php'),
                new MenuOption('./styles/images/folder_open_fill.svg', IconSize::Normal, 'Apply', 'apply.php'),
                new MenuOption('./styles/images/emoji_fill.svg', IconSize::Normal, 'About', 'about.php')
            ), 
            './styles/images/glow-logo.svg', 'Apply'
        )
    ?>
    <section class="apply-graphic-container">
        <div>
            <h4>👋 Hellooo!</h4>
            <p>Fill in the information on the right</p>
        </div>

        <iframe src="data:text/html;base64,PGh0bWw+CiAgICAgICAgPGhlYWQ+CiAgICAgICAgICAgIDxtZXRhIG5hbWU9InZpZXdwb3J0IiBjb250ZW50PSJ3aWR0aD1kZXZpY2Utd2lkdGgsIGluaXRpYWwtc2NhbGU9MSI+CiAgICAgICAgICAgIDxzdHlsZT4KICAgICAgICAgICAgICAgIGh0bWwsIGJvZHl7CiAgICAgICAgICAgICAgICAgICAgbWFyZ2luOiAwOwogICAgICAgICAgICAgICAgICAgIHBhZGRpbmc6IDA7CiAgICAgICAgICAgICAgICAgICAgd2lkdGg6IDEwMCU7CiAgICAgICAgICAgICAgICAgICAgaGVpZ2h0OiAxMDAlOwogICAgICAgICAgICAgICAgICAgIGJvcmRlcjogMDsKICAgICAgICAgICAgICAgIH0KICAgICAgICAgICAgPC9zdHlsZT4KICAgICAgICAgICAgPHNjcmlwdCB0eXBlPSJpbXBvcnRtYXAiPgp7CiAgICAiaW1wb3J0cyI6IHsKICAgICAgICAicmVhY3QiOiAiaHR0cHM6Ly9jZG4uc2t5cGFjay5kZXYvcmVhY3RAMTguMC4yIiwKICAgICAgICAicmVhY3QtZG9tIjogImh0dHBzOi8vY2RuLnNreXBhY2suZGV2L3JlYWN0LWRvbUAxOC4wLjIiLAogICAgICAgICJ0aHJlZSI6ICJodHRwczovL2Nkbi5za3lwYWNrLmRldi90aHJlZUAwLjE0OC4wIiwKICAgICAgICAicmVhY3QtdGhyZWUvZmliZXIiOiAiaHR0cHM6Ly9jZG4uc2t5cGFjay5kZXYvQHJlYWN0LXRocmVlL2ZpYmVyQDcuMC4yNCIKICAgIH0KfQo8L3NjcmlwdD4KPHN0eWxlPgogICAgaHRtbCwgYm9keXsKICAgICAgICBtYXJnaW46IDA7CiAgICAgICAgcGFkZGluZzogMDsKICAgICAgICB3aWR0aDogMTAwJTsKICAgICAgICBoZWlnaHQ6IDEwMCU7CiAgICAgICAgYm9yZGVyOiAwOwogICAgfQogICAgLm50LWVtYmVkewogICAgICAgIHdpZHRoOiAxMDAlOwogICAgICAgIGhlaWdodDogMTAwJTsKICAgIH0KICAgIC5udC1lbWJlZCBjYW52YXN7CiAgICAgICAgd2lkdGg6IDEwMCU7CiAgICAgICAgaGVpZ2h0OiAxMDAlOwogICAgfQo8L3N0eWxlPgo8c2NyaXB0IHR5cGU9Im1vZHVsZSI+CiAgICBpbXBvcnQgUmVhY3QsIHt1c2VSZWYsdXNlTWVtb30gZnJvbSAncmVhY3QnOwogICAgaW1wb3J0IFJlYWN0RE9NIGZyb20gJ3JlYWN0LWRvbSc7CiAgICBpbXBvcnQgKiBhcyBUSFJFRSBmcm9tICd0aHJlZSc7CiAgICBpbXBvcnQge0NhbnZhcywgdXNlRnJhbWUsIHVzZVRocmVlfSBmcm9tICdyZWFjdC10aHJlZS9maWJlcic7CgogICAgbGV0IGVtYmVkUm9vdCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2RpdicpOwogICAgZW1iZWRSb290LmNsYXNzTmFtZSA9ICJudC1lbWJlZCI7CiAgICBkb2N1bWVudC5ib2R5LmFwcGVuZENoaWxkKGVtYmVkUm9vdCk7CgogICAgY29uc3QgVGV4dHVyZU1lc2ggPSAoKSA9PiB7CiAgICAgICAgY29uc3QgbWVzaCA9IHVzZVJlZihudWxsKQogICAgICAgIHVzZUZyYW1lKHN0YXRlID0+IHsKICAgICAgICAgICAgY29uc3QgeyBjbG9jaywgbW91c2UsIGdsLCBzY2VuZSwgY2FtZXJhIH0gPSBzdGF0ZQogICAgICAgICAgICBpZihtZXNoLmN1cnJlbnQpewogICAgICAgICAgICAgICAgbWVzaC5jdXJyZW50Lm1hdGVyaWFsLnVuaWZvcm1zLnVfbW91c2UudmFsdWUgPSBbbW91c2UueCAvIDIgKyAwLjUsIG1vdXNlLnkgLyAyICsgMC41XQogICAgICAgICAgICAgICAgbWVzaC5jdXJyZW50Lm1hdGVyaWFsLnVuaWZvcm1zLnVfdGltZS52YWx1ZSA9IGNsb2NrLmdldEVsYXBzZWRUaW1lKCkKICAgICAgICAgICAgICAgIGxldCBjID0gZ2wuZG9tRWxlbWVudC5nZXRCb3VuZGluZ0NsaWVudFJlY3QoKQogICAgICAgICAgICAgICAgbWVzaC5jdXJyZW50Lm1hdGVyaWFsLnVuaWZvcm1zLnVfcmVzb2x1dGlvbi52YWx1ZSA9IFtjLndpZHRoLGMuaGVpZ2h0XQogICAgICAgICAgICB9CiAgICAgICAgfSkKICAgICAgICAKICAgICAgICByZXR1cm4gUmVhY3QuY3JlYXRlRWxlbWVudCgnbWVzaCcsCiAgICAgICAgICAgIHsKICAgICAgICAgICAgICAgIHJlZjptZXNoLAogICAgICAgICAgICAgICAgcG9zaXRpb246IFswLDAsMF0sCiAgICAgICAgICAgICAgICBzY2FsZTogMSwKICAgICAgICAgICAgICAgIHJvdGF0aW9uOiBbMCwwLDBdCiAgICAgICAgICAgIH0sCiAgICAgICAgICAgIFJlYWN0LmNyZWF0ZUVsZW1lbnQoJ3BsYW5lR2VvbWV0cnknLHthcmdzOlsyNDAsNTgwXX0pLCAKICAgICAgICAgICAgUmVhY3QuY3JlYXRlRWxlbWVudCgnc2hhZGVyTWF0ZXJpYWwnLHsKICAgICAgICAgICAgICAgIGZyYWdtZW50U2hhZGVyOiBgLy8gRnJhZ21lbnQgc2hhZGVyCgoKCi8vIFVuaWZvcm1zCgp1bmlmb3JtIHZlYzIgdV9yZXNvbHV0aW9uOwoKdW5pZm9ybSB2ZWMyIHVfbW91c2U7Cgp1bmlmb3JtIGZsb2F0IHVfdGltZTsKCnVuaWZvcm0gdmVjNCB1X2NvbG9yc1s0XTsKCnVuaWZvcm0gZmxvYXQgdV9ibHVyOyAKCnVuaWZvcm0gYm9vbCB1X2FuaW1hdGU7Cgp1bmlmb3JtIGZsb2F0IHVfYW5pbWF0ZV9zcGVlZDsKCnVuaWZvcm0gZmxvYXQgdV9mcmVxdWVuY3k7CgogICAgCgojZGVmaW5lIFMoYSxiLHQpIHNtb290aHN0ZXAoYSxiLHQpCgoKCgoKI2lmbmRlZiBTUkdCX0VQU0lMT04gCiNkZWZpbmUgU1JHQl9FUFNJTE9OIDAuMDAwMDAwMDEKI2VuZGlmCgojaWZuZGVmIEZOQ19TUkdCMlJHQgojZGVmaW5lIEZOQ19TUkdCMlJHQgoKCgoKZmxvYXQgc3JnYjJyZ2IoZmxvYXQgY2hhbm5lbCkgewogICAgcmV0dXJuIChjaGFubmVsIDwgMC4wNDA0NSkgPyBjaGFubmVsICogMC4wNzczOTkzODA4IDogcG93KChjaGFubmVsICsgMC4wNTUpICogMC45NDc4NjcyOTg1NzgxOTksIDIuNCk7Cn0KCnZlYzMgc3JnYjJyZ2IodmVjMyBzcmdiKSB7CiAgICByZXR1cm4gdmVjMyhzcmdiMnJnYihzcmdiLnIgKyBTUkdCX0VQU0lMT04pLCAKICAgICAgICAgICAgICAgIHNyZ2IycmdiKHNyZ2IuZyArIFNSR0JfRVBTSUxPTiksICAgICAgICAgICAgICAgICBzcmdiMnJnYihzcmdiLmIgKyBTUkdCX0VQU0lMT04pKTsKfQoKdmVjNCBzcmdiMnJnYih2ZWM0IHNyZ2IpIHsKICAgIHJldHVybiB2ZWM0KHNyZ2IycmdiKHNyZ2IucmdiKSwgc3JnYi5hKTsKfQoKI2VuZGlmCgoKI2lmICFkZWZpbmVkKEZOQ19TQVRVUkFURSkgJiYgIWRlZmluZWQoc2F0dXJhdGUpCiNkZWZpbmUgRk5DX1NBVFVSQVRFCiNkZWZpbmUgc2F0dXJhdGUoeCkgY2xhbXAoeCwgMC4wLCAxLjApCiNlbmRpZgoKCgojaWZuZGVmIFNSR0JfRVBTSUxPTiAKI2RlZmluZSBTUkdCX0VQU0lMT04gMC4wMDAwMDAwMQojZW5kaWYKCiNpZm5kZWYgRk5DX1JHQjJTUkdCCiNkZWZpbmUgRk5DX1JHQjJTUkdCCgoKZmxvYXQgcmdiMnNyZ2IoZmxvYXQgY2hhbm5lbCkgewogICAgcmV0dXJuIChjaGFubmVsIDwgMC4wMDMxMzA4KSA/IGNoYW5uZWwgKiAxMi45MiA6IDEuMDU1ICogcG93KGNoYW5uZWwsIDAuNDE2NjY2NjY2NjY2NjY2NykgLSAwLjA1NTsKfQoKdmVjMyByZ2Iyc3JnYih2ZWMzIHJnYikgewogICAgcmV0dXJuIHNhdHVyYXRlKHZlYzMocmdiMnNyZ2IocmdiLnIgLSBTUkdCX0VQU0lMT04pLCByZ2Iyc3JnYihyZ2IuZyAtIFNSR0JfRVBTSUxPTiksIHJnYjJzcmdiKHJnYi5iIC0gU1JHQl9FUFNJTE9OKSkpOwp9Cgp2ZWM0IHJnYjJzcmdiKHZlYzQgcmdiKSB7CiAgICByZXR1cm4gdmVjNChyZ2Iyc3JnYihyZ2IucmdiKSwgcmdiLmEpOwp9CgojZW5kaWYKCgoKI2lmbmRlZiBGTkNfTUlYT0tMQUIKI2RlZmluZSBGTkNfTUlYT0tMQUIKdmVjMyBtaXhPa2xhYiggdmVjMyBjb2xBLCB2ZWMzIGNvbEIsIGZsb2F0IGggKSB7CgogICAgI2lmZGVmIE1JWE9LTEFCX0NPTE9SU1BBQ0VfU1JHQgogICAgY29sQSA9IHNyZ2IycmdiKGNvbEEpOwogICAgY29sQiA9IHNyZ2IycmdiKGNvbEIpOwogICAgI2VuZGlmCgogICAgCiAgICBjb25zdCBtYXQzIGtDT05FdG9MTVMgPSBtYXQzKCAgICAgICAgICAgICAgICAKICAgICAgICAgMC40MTIxNjU2MTIwLCAgMC4yMTE4NTkxMDcwLCAgMC4wODgzMDk3OTQ3LAogICAgICAgICAwLjUzNjI3NTIwODAsICAwLjY4MDcxODk1ODQsICAwLjI4MTg0NzQxNzQsCiAgICAgICAgIDAuMDUxNDU3NTY1MywgIDAuMTA3NDA2NTc5MCwgIDAuNjMwMjYxMzYxNik7CiAgICBjb25zdCBtYXQzIGtMTVN0b0NPTkUgPSBtYXQzKAogICAgICAgICA0LjA3NjcyNDUyOTMsIC0xLjI2ODE0Mzc3MzEsIC0wLjAwNDExMTk4ODUsCiAgICAgICAgLTMuMzA3MjE2ODgyNywgIDIuNjA5MzMyMzIzMSwgLTAuNzAzNDc2MzA5OCwKICAgICAgICAgMC4yMzA3NTkwNTQ0LCAtMC4zNDExMzQ0MjkwLCAgMS43MDY4NjI1Njg5KTsKICAgICAgICAgICAgICAgICAgICAKICAgIAogICAgdmVjMyBsbXNBID0gcG93KCBrQ09ORXRvTE1TICogY29sQSwgdmVjMygxLjAvMy4wKSApOwogICAgdmVjMyBsbXNCID0gcG93KCBrQ09ORXRvTE1TICogY29sQiwgdmVjMygxLjAvMy4wKSApOwogICAgCiAgICB2ZWMzIGxtcyA9IG1peCggbG1zQSwgbG1zQiwgaCApOwogICAgCiAgICAKICAgIHZlYzMgcmdiID0ga0xNU3RvQ09ORSoobG1zKmxtcypsbXMpOwoKICAgICNpZmRlZiBNSVhPS0xBQl9DT0xPUlNQQUNFX1NSR0IKICAgIHJldHVybiByZ2Iyc3JnYihyZ2IpOwogICAgI2Vsc2UKICAgIHJldHVybiByZ2I7CiAgICAjZW5kaWYKfQoKdmVjNCBtaXhPa2xhYiggdmVjNCBjb2xBLCB2ZWM0IGNvbEIsIGZsb2F0IGggKSB7CiAgICByZXR1cm4gdmVjNCggbWl4T2tsYWIoY29sQS5yZ2IsIGNvbEIucmdiLCBoKSwgbWl4KGNvbEEuYSwgY29sQi5hLCBoKSApOwp9CiNlbmRpZgoKCgptYXQyIFJvdChmbG9hdCBhKQoKewoKICAgIGZsb2F0IHMgPSBzaW4oYSk7CgogICAgZmxvYXQgYyA9IGNvcyhhKTsKCiAgICByZXR1cm4gbWF0MihjLCAtcywgcywgYyk7Cgp9CgoKCgoKLy8gQ3JlYXRlZCBieSBpbmlnbyBxdWlsZXogLSBpcS8yMDE0CgovLyBMaWNlbnNlIENyZWF0aXZlIENvbW1vbnMgQXR0cmlidXRpb24tTm9uQ29tbWVyY2lhbC1TaGFyZUFsaWtlIDMuMCBVbnBvcnRlZCBMaWNlbnNlLgoKdmVjMiBoYXNoKCB2ZWMyIHAgKQoKewoKICAgIHAgPSB2ZWMyKCBkb3QocCx2ZWMyKDIxMjcuMSw4MS4xNykpLCBkb3QocCx2ZWMyKDEyNjkuNSwyODMuMzcpKSApOwoKCXJldHVybiBmcmFjdChzaW4ocCkqNDM3NTguNTQ1Myk7Cgp9CgoKCmZsb2F0IG5vaXNlKCBpbiB2ZWMyIHAgKQoKewoKICAgIHZlYzIgaSA9IGZsb29yKCBwICk7CgogICAgdmVjMiBmID0gZnJhY3QoIHAgKTsKCgkKCgl2ZWMyIHUgPSBmKmYqKDMuMC0yLjAqZik7CgoKCiAgICBmbG9hdCBuID0gbWl4KCBtaXgoIGRvdCggLTEuMCsyLjAqaGFzaCggaSArIHZlYzIoMC4wLDAuMCkgKSwgZiAtIHZlYzIoMC4wLDAuMCkgKSwgCgogICAgICAgICAgICAgICAgICAgICAgICBkb3QoIC0xLjArMi4wKmhhc2goIGkgKyB2ZWMyKDEuMCwwLjApICksIGYgLSB2ZWMyKDEuMCwwLjApICksIHUueCksCgogICAgICAgICAgICAgICAgICAgbWl4KCBkb3QoIC0xLjArMi4wKmhhc2goIGkgKyB2ZWMyKDAuMCwxLjApICksIGYgLSB2ZWMyKDAuMCwxLjApICksIAoKICAgICAgICAgICAgICAgICAgICAgICAgZG90KCAtMS4wKzIuMCpoYXNoKCBpICsgdmVjMigxLjAsMS4wKSApLCBmIC0gdmVjMigxLjAsMS4wKSApLCB1LngpLCB1LnkpOwoKCXJldHVybiAwLjUgKyAwLjUqbjsKCn0KCgoKdm9pZCBtYWluKCl7CgogIAoKICAgIHZlYzIgdXYgPSBnbF9GcmFnQ29vcmQueHkvdV9yZXNvbHV0aW9uLnh5OwoKICAgIGZsb2F0IHJhdGlvID0gdV9yZXNvbHV0aW9uLnggLyB1X3Jlc29sdXRpb24ueTsKCgoKICAgIHZlYzIgdHV2ID0gdXY7CgogICAgdHV2IC09IC41OwoKICAgIAoKICAgIC8vYW5pbWF0aW9uCgogICAgZmxvYXQgc3BlZWQgPSB1X3RpbWUgKiAxMC4gKiB1X2FuaW1hdGVfc3BlZWQ7CgogICAgaWYodV9hbmltYXRlID09IGZhbHNlKXsKCiAgICAgIHNwZWVkID0gMC4wOwoKICAgIH0KCgoKICAgIC8vIHJvdGF0ZSB3aXRoIE5vaXNlCgogICAgZmxvYXQgZGVncmVlID0gbm9pc2UodmVjMihzcGVlZC8xMDAuMCwgdHV2LngqdHV2LnkpKTsKCgoKICAgIHR1di55ICo9IDEuL3JhdGlvOwoKICAgIHR1diAqPSBSb3QocmFkaWFucygoZGVncmVlLS41KSo3MjAuKzE4MC4pKTsKCgl0dXYueSAqPSByYXRpbzsKCiAgICAKCiAgICAvLyBXYXZlIHdhcnAgd2l0aCBzaW4KCiAgICBmbG9hdCBmcmVxdWVuY3kgPSAyMC4gKiB1X2ZyZXF1ZW5jeTsKCiAgICBmbG9hdCBhbXBsaXR1ZGUgPSAzMC4gKiAoMTAuKigwLjAxK3VfYmx1cikpOwoKICAgIAoKICAgIHR1di54ICs9IHNpbih0dXYueSpmcmVxdWVuY3krc3BlZWQpL2FtcGxpdHVkZTsKCiAgIAl0dXYueSArPSBzaW4odHV2LngqZnJlcXVlbmN5KjEuNStzcGVlZCkvKGFtcGxpdHVkZSouNSk7CgogICAgCgogICAgCgogICAgLy8gZHJhdyB0aGUgaW1hZ2UKCiAgICB2ZWM0IGxheWVyMSA9IG1peE9rbGFiKHVfY29sb3JzWzBdLCB1X2NvbG9yc1sxXSwgUygtLjMsIC4yLCAodHV2KlJvdChyYWRpYW5zKC01LikpKS54KSk7CgogICAgdmVjNCBsYXllcjIgPSBtaXhPa2xhYih1X2NvbG9yc1syXSwgdV9jb2xvcnNbM10sIFMoLS4zLCAuMiwgKHR1dipSb3QocmFkaWFucygtNS4pKSkueCkpOwoKICAgIAoKICAgIHZlYzQgZmluYWxDb21wID0gbWl4T2tsYWIobGF5ZXIxLCBsYXllcjIsIFMoLjUsIC0uMywgdHV2LnkpKTsKCiAgICAKCiAgICAKCiAgICBnbF9GcmFnQ29sb3IgPSBmaW5hbENvbXA7CgogICAgCgp9CgpgLAogICAgICAgICAgICAgICAgdmVydGV4U2hhZGVyOiBgLy8gVmVydGV4IHNoYWRlcgoKdm9pZCBtYWluKCkgewogIGdsX1Bvc2l0aW9uID0gcHJvamVjdGlvbk1hdHJpeCAqIG1vZGVsVmlld01hdHJpeCAqIHZlYzQocG9zaXRpb24sIDEuMCk7Cn1gLAogICAgICAgICAgICAgICAgdW5pZm9ybXM6IHt1X2NvbG9yczoge3ZhbHVlOiBbbmV3IFRIUkVFLlZlY3RvcjQoMC45ODgyMzUyOTQxMTc2NDcxLDAuOTMzMzMzMzMzMzMzMzMzMywwLjgzOTIxNTY4NjI3NDUwOTgsMSksbmV3IFRIUkVFLlZlY3RvcjQoMC45NDExNzY0NzA1ODgyMzUzLDAuNjM1Mjk0MTE3NjQ3MDU4OCwwLjA3ODQzMTM3MjU0OTAxOTYsMSksbmV3IFRIUkVFLlZlY3RvcjQoMC45NDExNzY0NzA1ODgyMzUzLDAuNjM1Mjk0MTE3NjQ3MDU4OCwwLjA3ODQzMTM3MjU0OTAxOTYsMSksbmV3IFRIUkVFLlZlY3RvcjQoMC45ODgyMzUyOTQxMTc2NDcxLDAuOTMzMzMzMzMzMzMzMzMzMywwLjgzOTIxNTY4NjI3NDUwOTgsMSldfSx1X2JsdXI6IHt2YWx1ZTogMC41NDZ9LHVfYW5pbWF0ZToge3ZhbHVlOiB0cnVlfSx1X2FuaW1hdGVfc3BlZWQ6IHt2YWx1ZTogMC4yNTJ9LHVfZnJlcXVlbmN5OiB7dmFsdWU6IDAuNX0sdV90aW1lOiB7dmFsdWU6IDB9LHVfbW91c2U6IHt2YWx1ZTogWzAsMF19LHVfcmVzb2x1dGlvbjoge3ZhbHVlOiBbMjQwLDU4MF19fSwKICAgICAgICAgICAgICAgIHdpcmVmcmFtZTogZmFsc2UsIAogICAgICAgICAgICAgICAgd2lyZWZyYW1lTGluZXdpZHRoOiAwLAogICAgICAgICAgICAgICAgZGl0aGVyaW5nOiBmYWxzZSwKICAgICAgICAgICAgICAgIGZsYXRTaGFkaW5nOiB0cnVlLAogICAgICAgICAgICAgICAgZG91YmxlU2lkZWQ6IHRydWUsCiAgICAgICAgICAgICAgICBnbHNsVmVyc2lvbjogIjEwMCIKICAgICAgICAgICAgfSkKICAgICAgICApOyAgCiAgICB9CgogICAgUmVhY3RET00ucmVuZGVyKFJlYWN0LmNyZWF0ZUVsZW1lbnQoQ2FudmFzLHsKICAgICAgICAgICAgZ2w6IHsKICAgICAgICAgICAgICAgIHByZXNlcnZlRHJhd2luZ0J1ZmZlcjogdHJ1ZSwKICAgICAgICAgICAgICAgIHByZW11bHRpcGxpZWRBbHBoYTogZmFsc2UsCiAgICAgICAgICAgICAgICBhbHBoYTogdHJ1ZSwKICAgICAgICAgICAgICAgIHRyYW5zcGFyZW50OiB0cnVlLAogICAgICAgICAgICAgICAgYW50aWFsaWFzOiB0cnVlLAogICAgICAgICAgICAgICAgcHJlY2lzaW9uOiAiaGlnaHAiLAogICAgICAgICAgICAgICAgcG93ZXJQcmVmZXJlbmNlOiAiaGlnaC1wZXJmb3JtYW5jZSIKICAgICAgICAgICAgfSwKICAgICAgICAgICAgcmVzaXplOnsKICAgICAgICAgICAgICAgIGRlYm91bmNlOiAwLAogICAgICAgICAgICAgICAgc2Nyb2xsOiBmYWxzZSwKICAgICAgICAgICAgICAgIG9mZnNldFNpemU6IHRydWUKICAgICAgICAgICAgfSwKICAgICAgICAgICAgZHByOiAxLAogICAgICAgICAgICBjYW1lcmE6IHsKICAgICAgICAgICAgICAgIGZvdjogNzUsCiAgICAgICAgICAgICAgICBuZWFyOiAwLjEsCiAgICAgICAgICAgICAgICBmYXI6IDEwMDAsCiAgICAgICAgICAgICAgICBwb3NpdGlvbjogWzAsMCw1XQogICAgICAgICAgICB9LAogICAgICAgICAgICBzdHlsZTp7IGhlaWdodDogIjEwMCUiLCB3aWR0aDogIjEwMCUiIH0KICAgICAgICB9LAogICAgICAgIFJlYWN0LmNyZWF0ZUVsZW1lbnQoVGV4dHVyZU1lc2gpICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICApLCBlbWJlZFJvb3QpOwo8L3NjcmlwdD4KICAgICAgICA8L2hlYWQ+CiAgICAgICAgPGJvZHk+CjwhLS0gQVNTRVQgTk9UIElOTElORUQ6IGFzc2V0cy9ib29rLjVmYjExYjhkLnN2ZyAtLT4KCjwhLS0gQVNTRVQgTk9UIElOTElORUQ6IGFzc2V0cy9seWdpYS5mNzQ5MDU5NC5zdmcgLS0+Cgo8IS0tIEFTU0VUIE5PVCBJTkxJTkVEOiBhc3NldHMvb3ZlcmZsb3cuOGQ1MDQxNWQuc3ZnIC0tPgoKPCEtLSBBU1NFVCBOT1QgSU5MSU5FRDogYXNzZXRzL3RyYXNoLjUyNGRiY2QzLnN2ZyAtLT4KCjwhLS0gQVNTRVQgTk9UIElOTElORUQ6IGFzc2V0cy92ZXJ0aWNhbC45MDYxMDg0OS5zdmcgLS0+Cgo8IS0tIEFTU0VUIE5PVCBJTkxJTkVEOiBhc3NldHMvaG9yaXpvbnRhbC40NGY3NzFmOC5zdmcgLS0+Cgo8IS0tIEFTU0VUIE5PVCBJTkxJTkVEOiBhc3NldHMvYWRkLmE1NTI0MGRkLnN2ZyAtLT4KCjwhLS0gQVNTRVQgTk9UIElOTElORUQ6IGFzc2V0cy9zaWcuODUwYTg1ZTcuc3ZnIC0tPgoKPCEtLSBBU1NFVCBOT1QgSU5MSU5FRDogYXNzZXRzL21pbnVzLjFlMWEwYWJkLnN2ZyAtLT4KCjwhLS0gQVNTRVQgTk9UIElOTElORUQ6IGFzc2V0cy9lZmZlY3QuNDU1NzI0M2Yuc3ZnIC0tPgoKPCEtLSBBU1NFVCBOT1QgSU5MSU5FRDogYXNzZXRzL3Zpc2libGUuYzZkNGUxYzAuc3ZnIC0tPgoKPCEtLSBBU1NFVCBOT1QgSU5MSU5FRDogYXNzZXRzL2hpZGRlbi41YTRmYzI1NC5zdmcgLS0+Cgo8IS0tIEFTU0VUIE5PVCBJTkxJTkVEOiBhc3NldHMvd29ya2VyLmI3NjFmYjExLmpzIC0tPgo8L2JvZHk+CiAgICAgICAgPC9odG1sPg=="></iframe>
    </section>

    <div class="apply-form-container">
        <form method="post" action="process-eoi.php">
            <section id="personal-information">
                <div class="apply-header">
                    <img src="images/icons/person-run.svg" alt="Personal Information Icon">
                    <h4>Personal Information</h4>
                    <p>We need to know some stuff about you.</p>
                </div>

                <div class="apply-grid">
                    <?php
                        echo createInput('text', 'first-name', 20, InputSize::Normal, 'Enter your first name', '', true, false, 'First name');
                        echo createInput('text', 'last-name', 20, InputSize::Normal, 'Enter your last name', '', true, false, 'Last name');
                        echo createInput('text', 'date-of-birth', 0, InputSize::Normal, 'dd/mm/yyyy', '\d{2}/\d{2}/\d{4}', true, false, 'Date of birth');
                        echo createInput('text', 'street-address', 40, InputSize::Normal, 'Enter your street address', '', true, false, 'Street address');
                        echo createInput('text', 'suburb', 40, InputSize::Normal, 'Enter your suburb', '', true, false, 'Suburb');
                    ?>
                    <div class="input-field">
                        <label for="state">State</label>
                        <select name="state" id="state">
                            <option value="" disabled selected>Select</option>
                            <option value="nsw">NSW</option>
                            <option value="vic">VIC</option>
                            <option value="qld">QLD</option>
                            <option value="wa">WA</option>
                            <option value="sa">SA</option>
                            <option value="tas">TAS</option>
                            <option value="act">ACT</option>
                            <option value="nt">NT</option>
                        </select>
                    </div>
                    <?php
                        echo createInput('text', 'postcode', 0, InputSize::Normal, 'Enter your postcode', '[0-9]{4}', true, false, 'Postcode');
                    ?>
                    <fieldset>
                        <legend>Gender</legend>

                        <?php
                            echo createRadio('male', 'gender', 'male', 'Male', true);
                            echo createRadio('female', 'gender', 'female', 'Female');
                            echo createRadio('other', 'gender', 'other', 'Other');
                        ?>
                    </fieldset>
                </div>

                <?php echo createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, '', 'Next', 'button', '#contact-details') ?>
            </section>


            <section id="contact-details">
                <div class="apply-header">
                    <img src="images/icons/contact.svg" alt="Contact Details Icon">
                    <h4>Contact Details</h4>
                    <p>A bit of information about how we can contact you.</p>
                </div>

                <div id="apply-grid-2">
                    <?php
                        echo createInput('email', 'email', 0, InputSize::Normal, 'you@example.com', '[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}', true, false, 'Enter email');
                        echo createInput('text', 'phone-number', 0, InputSize::Normal, '0000-000-000', '[0-9]{4}-[0-9]{3}-[0-9]{3}', true, false, 'Phone Number');
                    ?>
                </div>

                <div class="button-group">
                     <?php echo createButton(ButtonSize::Normal, ButtonVariant::Shaded, ButtonColor::Grey, './styles/images/left_line.svg', 'Go back', 'button', '#personal-information') ?>

                    <?php echo createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, '', 'Next', 'button', '#role-information') ?>
                </div>
            </section>

            <section id="role-information">
                <div class="apply-header">
                    <img src="images/icons/jobs.svg" alt="Contact Details Icon">
                    <h4>Role Information</h4>
                    <p>Tell us what your dream job is at Glow.</p>
                </div>

                <div id="apply-grid-3">
                    <div class="input-field">
                        <label for="jobreference">Job Reference ID</label>
                        <select name="jobreference" id="jobreference" class="input">
                            <option value="" disabled selected>Select</option>
                            <?php
                                foreach ($jobs as $job) {
                                    echo "<option value=\"{$job['jobid']}\">{$job['jobid']}</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div id="checkbox-fieldset">
                        <p><label>Technical List</label></p>
                        <?php
                            echo createCheckbox('languages', 'technical[]', 'languages', 'Programming Languages');
                            echo createCheckbox('framework', 'technical[]', 'framework', 'Frameworks & Libraries');
                            echo createCheckbox('devops', 'technical[]', 'devops', 'DevOps & Tools');
                        ?>
                    </div>

                    <div class="input-field">
                        <?php
                            echo createInput('textarea', 'other-skills', 0, InputSize::Normal, 'Enter any additional skills', '', false, false, 'Other Skills');
                        ?>
                    </div>
                </div>

                <div class="button-group">
                     <?php echo createButton(ButtonSize::Normal, ButtonVariant::Shaded, ButtonColor::Grey, './styles/images/left_line.svg', 'Go back', 'button', '#contact-details') ?>
    
                     <?php echo createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, './styles/images/rocket_fill.svg', 'Submit', 'submit') ?>
                </div>
            </section>
        </form>
    </div>

</body>
</html>

