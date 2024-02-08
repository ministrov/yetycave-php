<main>
  <div class="container">
    <section class="lots">
      <h2>Результаты поиска по запросу «<span><?= $search; ?></span>»</h2>
      <?php if (!empty($goods)) : ?>
        <ul class="lots__list">
          <?php foreach ($goods as $good) : ?>
            <li class="lots__item lot">
              <div class="lot__image">
                <img src="<?= $good["img"]; ?>" width="350" height="260" alt="">
              </div>
              <div class="lot__info">
                <span class="lot__category"><?= $good["name_category"]; ?></span>
                <h3 class="lot__title"><a class="text-link" href="lot.php?id=<?= $good["id"]; ?>"><?= htmlspecialchars($good["title"]); ?></a></h3>
                <div class="lot__state">
                  <div class="lot__rate">
                    <span class="lot__amount">Стартовая цена</span>
                    <span class="lot__cost"><?= get_format_number(htmlspecialchars($good["start_price"])); ?></span>
                  </div>
                  <?php $res = get_time_left(htmlspecialchars($good["date_finish"])) ?>
                  <div class="lot__timer timer <?php if ($res[0] < 1) : ?>timer--finishing<?php endif; ?>">
                    <?= "$res[0] : $res[1]"; ?>
                  </div>
                </div>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </section>
  </div>
</main>