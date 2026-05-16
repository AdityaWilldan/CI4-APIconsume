<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>

<h1 class="mb-4">Cari Komik</h1>

<form action="/" method="get" class="row g-2 mb-4">
    <div class="col-md-8">
        <input type="text" name="s" class="form-control" placeholder="Judul komik..." value="<?= esc($search) ?>">
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary w-100">Cari</button>
    </div>
</form>

<?php if (!empty($komik_list)) : ?>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-3">
        <?php foreach ($komik_list as $item) : ?>
            <div class="col">
                <div class="komik-card">
                    <div class="position-relative">
                        <img src="<?= esc($item['thumbnail']) ?>" 
                             class="komik-thumb" 
                             alt="<?= esc($item['title']) ?>"
                             data-bs-toggle="modal" 
                             data-bs-target="#komikDetailModal"
                             data-title="<?= esc($item['title']) ?>"
                             data-description="<?= esc($item['description']) ?>"
                             data-thumbnail="<?= esc($item['thumbnail']) ?>"
                             data-latest="<?= esc($item['latest_chapter']) ?>">
                        <span class="badge-chapter"><?= esc($item['latest_chapter']) ?></span>
                    </div>
                    <div class="p-2">
                        <h6 class="card-title text-truncate"><?= esc($item['title']) ?></h6>
                        <div class="card-text"><?= esc($item['latest_chapter']) ?></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <nav class="mt-4">
        <ul class="pagination justify-content-center">
            <?php if ($prev_page) : ?>
                <li class="page-item"><a class="page-link" href="<?= esc($prev_page) ?>">← Sebelumnya</a></li>
            <?php endif; ?>
            <?php if ($next_page) : ?>
                <li class="page-item"><a class="page-link" href="<?= esc($next_page) ?>">Berikutnya →</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <?php
    $rekomendasi = $komik_list;
    shuffle($rekomendasi);
    $rekomendasi = array_slice($rekomendasi, 0, 6);
    if (count($rekomendasi) > 0): ?>
    <div class="mt-5">
        <h2 class="mb-3" style="color:#fff; border-left: 4px solid #0d6efd; padding-left: 12px;">Rekomendasi</h2>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3">
            <?php foreach ($rekomendasi as $item): ?>
                <div class="col">
                    <div class="komik-card">
                        <div class="position-relative">
                            <img src="<?= esc($item['thumbnail']) ?>" 
                                 class="komik-thumb" 
                                 style="height:200px;" 
                                 alt="<?= esc($item['title']) ?>"
                                 data-bs-toggle="modal" 
                                 data-bs-target="#komikDetailModal"
                                 data-title="<?= esc($item['title']) ?>"
                                 data-description="<?= esc($item['description']) ?>"
                                 data-thumbnail="<?= esc($item['thumbnail']) ?>"
                                 data-latest="<?= esc($item['latest_chapter']) ?>">
                            <span class="badge-chapter"><?= esc($item['latest_chapter']) ?></span>
                        </div>
                        <div class="p-2">
                            <h6 class="card-title text-truncate"><?= esc($item['title']) ?></h6>
                            <div class="card-text small text-muted"><?= esc($item['latest_chapter']) ?></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

<?php else : ?>
    <div class="alert alert-info">Tidak ada komik ditemukan.</div>
<?php endif; ?>

<div class="modal fade" id="komikDetailModal" tabindex="-1" aria-labelledby="komikDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="komikDetailModalLabel">Detail Komik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <img id="komikDetailThumbnail" src="" alt="" class="img-fluid rounded">
                    </div>
                    <div class="col-md-8">
                        <h3 id="komikDetailTitle"></h3>
                        <p class="text-muted" id="komikDetailLatest"></p>
                        <p id="komikDetailDescription"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var komikModal = document.getElementById('komikDetailModal');
        if (komikModal) {
            komikModal.addEventListener('show.bs.modal', function (event) {
                var trigger = event.relatedTarget;
                var title = trigger.getAttribute('data-title');
                var description = trigger.getAttribute('data-description');
                var thumbnail = trigger.getAttribute('data-thumbnail');
                var latest = trigger.getAttribute('data-latest');

                komikModal.querySelector('#komikDetailModalLabel').textContent = title;
                komikModal.querySelector('#komikDetailTitle').textContent = title;
                komikModal.querySelector('#komikDetailLatest').textContent = latest;
                komikModal.querySelector('#komikDetailDescription').textContent = description;
                komikModal.querySelector('#komikDetailThumbnail').src = thumbnail;
                komikModal.querySelector('#komikDetailThumbnail').alt = title;
            });
        }
    });
</script>

<?= $this->endSection() ?>