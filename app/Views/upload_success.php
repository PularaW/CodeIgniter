<!DOCTYPE html>
<html lang="en">

<head>
    <title>Upload Successful</title>
</head>

<body>

    <h3>Your image was successfully uploaded!</h3>

    <!--details of the uploaded file-->
    <ul>
        <li>Name: <?= esc($uploaded_flleinfo->getBasename()) ?></li>
        <li>Size: <?= esc($uploaded_flleinfo->getSizeByUnit('kb')) ?> KB</li>
        <li>Extension: <?= esc($uploaded_flleinfo->guessExtension()) ?></li>
    </ul>

    <p><?= anchor('upload', 'Upload Another File!') ?></p>
    <p><?= anchor('viewimages', 'View Uploaded Images') ?></p>

</body>

</html>