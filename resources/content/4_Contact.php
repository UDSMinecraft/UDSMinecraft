<?php
global $submissionMsg;
Submission::checkSubmission();
?>
<h2>Contact Us</h2>
<p>
    You can contact the UDS Admins on their personal YouTube accounts shown on
    the Admins page. Below are listed some alternative methods of contact.
</p>
<p>
    Contact Mag on his YouTube about the server or website and to send him
    images you would like uploaded onto the gallery page.
</p>
<hr>
<?php if (isset($submissionMsg)) {?>
<form method='post' action='/'>
    <p class='center'><?=$submissionMsg?></p>
<?php
    HTML::echoButton("OK", "", "redirect");
    echo "</form>";
} else {
    include TEMPLATES."/contact_form.php";
}
?>
<hr>
