<?php $this->layout("page/teachers/default", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>

<h3>Name: <?= $this->e($teacher->name) ?></h3>
<h3>Email: <?= $this->e($teacher->email) ?></h3>


<?php $this->stop() ?>