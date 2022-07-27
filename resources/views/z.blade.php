<!DOCTYPE html>
<html>
<body>

<?php
$title = 'Ahihi đồ ngốc';
$short_url = 'http://it15.internship.rcvn.work/index.php/shop/z';
$url = 'http://fullurl.com';

$twitter_params =
    '?text=' . urlencode($title) . '+-' .
    '&amp;url=' . urlencode($short_url);


$link = "http://twitter.com/share" . $twitter_params . "";
?>

<a href="<?php echo $link; ?>">Share on Twitter</a>

</body>
</html>
