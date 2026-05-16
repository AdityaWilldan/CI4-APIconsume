<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>

<a href="/" class="btn btn-secondary mb-3">← Kembali</a>

<div class="komik-card p-3" style="cursor: default;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="<?= esc($komik['thumbnail']) ?>" class="img-fluid rounded" alt="<?= esc($komik['title']) ?>" style="width:100%;">
        </div>
        <div class="col-md-8">
            <div class="ps-md-3 mt-3 mt-md-0">
                <h2 class="card-title"><?= esc($komik['title']) ?></h2>
                <p class="card-text"><strong>Chapter terbaru:</strong> <?= esc($komik['latest_chapter']) ?></p>
                <p class="card-text"><?= esc($komik['description']) ?></p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>