<!DOCTYPE html>
<html lang="en">

<head>
    <title>Uploaded Images</title>
    <style>
        td,th{
            border: 1px solid;
            padding-left: 20px;
        }
    </style>
</head>

<body>

    <p><?= anchor('upload', 'Upload Another File!') ?></p>

    <!--display all the uploaded images-->
    <table style="width:65%;border: 1px solid">
    <tr style="height: 40px;">
        <th colspan='2'>Uploaded Images</th>
    </tr>
    <tr>
        <td style="width:15%;"><b>Image  <b></td>
        <td><b>Title  <b> </td>
    </tr>
    <?php foreach ($result->getResult() as $image) :
     ?>
    <tr>
        <td><a target="_blank" href="<?php echo base_url($image->img_path); ?>">
                <img height="100px" width="100px" src="<?php echo base_url($image->img_path); ?>" title="<?php echo $image->title ?>">
            </a> </td>
        <td><?php echo $image->title ?></td>
    </tr>
    <?php endforeach; ?>
 
</table>
    
        
   
</body>

</html>



