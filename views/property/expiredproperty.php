<h2 style="color:#FF3300">Expired Properties</h2>
<div>&nbsp;</div>
<table style="font-family:sans-serif; width:756px; border:1px solid #EFEFEF; border-radius:8px;" border="1">
    <tr style="height:26px; font-size:14px; background-color:#1c558a; color:white; text-shadow:1px 2px 1px #082b4c; border:1px solid #EFEFEF;">
        <td>Posted on</td>
        <td>Property for</td>
        <td>Type</td>
        <td>Title</td>
        <td>Description</td>
        <td>&nbsp;</td>
    </tr>
    <?php
    if (!empty($properties)) {
        foreach ($properties as $property) {
            ?>
            <tr>
                <td style="font-size:12px;">
        <?php echo date('Y-m-d', $property['postedon']) ?>
    </td>
                <td>
        <?php echo $property['for'] ?>
                </td>
                <td>
         <?php echo $propertyType[$property['type']]?>
                </td>
                <td>
                    <?php echo $property['title'] ?>
                </td><td>
        <?php echo $property['description'] ?>
                </td>
                <td>

                    <a href="<?php echo BASE_URL ?>property/edit/id/<?php echo $property['pid'] ?>">Edit</a>&nbsp;
                    <?php if ($status && $status !== 2) { ?>
                        <a href="<?php echo BASE_URL ?>property/publish/id/<?php echo $property['pid'] ?>">Publish</a>
        <?php } ?>
                </td>
            </tr>


        <?php }
    } else {
        ?><tr><td colspan="5" style="text-align: center;    ">No record found</td></tr><?php
}
    ?>
</table>
<?php echo $pagination;?>