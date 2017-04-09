<?php
namespace cmpe174\hw3\views\elements;

require_once('Element.php');

class orderedListElement extends Element
{
    public function render($datas){
        ?>
        <ol style="list-style-type: none">
        	<li><h3>Highest Rated</h3></li>
        	<li><h3>Most Viewed</h3></li>
        	<li><h3>Newest</h3></li>
        </ol>

<?php
    }
}
