<!-- navigation -->
<div class="navigation">
    <a href="<?php echo base_url(); ?>">Home</a>
    <a href="<?php echo base_url('livre/add'); ?>">Ajouter</a>
</div>
<table>
    <tr>
        <td>#</td>
        <td><a href="<?php echo base_url('Livre/Index/titre'); ?>">titre</a></td>
        <td>couverture</td>
        <td><a href="<?php echo base_url('Livre/Index/idAuteur'); ?>">id auteur</a></td>
        <td>id editeur</td>
        <td>id quizz</td>
        <td>image</td>
        <td>Actions</td>
    </tr>   
<?php
    
    $i=0;
    
    foreach ($livres as $l):
        //echo '<tr>';
        if($i%2==0){
            //$color="#CECECE";
            $color="#E0CDA9";            
        }
        else{
            //$color="#848484";
            $color="#CC4E5C";
        }
        
        echo '<tr bgcolor="'.$color.'">';
        echo '<td>';
        echo $l['id'];
        echo '</td>';
        echo '<td>';
        echo $l['titre'];
        echo '</td>';
        echo '<td>';
        echo $l['couverture'];
        echo '</td>';
        echo '<td>';
        echo $l['idAuteur'];
        echo '</td>';
        echo '<td>';
        echo $l['idEditeur'];
        echo '</td>';
        echo '<td>';
        echo $l['idQuizz'];
        echo '</td>';
        echo '<td>';
        echo '<img src=" ';
        echo base_url('img/' . $l['couverture']);
        echo '" alt="';
        echo $l['titre'];
        echo '" height="50" width="50">';
        echo '</td>';
        echo '<td>';
        echo '<a href=" ';
        echo site_url('livre/edit/' . $l['id']);
        echo '">Edit</a> |';
        echo '<a href=" ';
        echo site_url('livre/remove/' . $l['id']);
        echo '">Delete</a>';
        echo '</td>';
        echo '</tr>';
        $i=$i+1;
    endforeach; 
 ?>
</table>
 <?php echo $links; ?>