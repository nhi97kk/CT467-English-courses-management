<?php $this->layout("page/teachers/default", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>

<h3>Name: <?= $this->e($teacher->name) ?></h3>
<h3>Email: <?= $this->e($teacher->email) ?></h3>
<h3>Phone: <?= $this->e($teacher->phone) ?></h3>
<h3>Major: <?= $this->e($teacher->major) ?></h3>
<h3>Exp: <?= $this->e($teacher->exp) ?></h3>

<?php $this->stop() ?>