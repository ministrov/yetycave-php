<main>
  <?= $navigation; ?>
  <div class="container">
    <section class="lots">
      <h2>Результаты поиска по запросу «<span><?= trim($search); ?></span>»</h2>
      <?php if (!empty($goods)) : ?>
        <ul class="lots__list">
          <?php foreach ($goods as $good) : ?>
            <li class="lots__item lot">
              <div class="lot__image">
                <img src="<?= $good["img"] || $goods["img"]; ?>" width="350" height="260" alt="">
              </div>
              <div class="lot__info">
                <span class="lot__category"><?= $good["name_category"] || $goods["name_category"]; ?></span>
                <h3 class="lot__title"><a class="text-link" href="lot.php?id=<?= $good["id"] || $goods["id"]; ?>"><?= htmlspecialchars($good["title"]) || $goods["title"]; ?></a></h3>
                <div class="lot__state">
                  <div class="lot__rate">
                    <span class="lot__amount">Стартовая цена</span>
                    <span class="lot__cost"><?= get_format_number(htmlspecialchars($good["start_price"])) || get_time_left($goods["start_price"]); ?></span>
                  </div>
                  <?php $res = get_time_left(htmlspecialchars($good["date_finish"])) || get_time_left(htmlspecialchars($goods["date_finish"])); ?>
                  <div class="lot__timer timer <?php if ($res[0] < 1) : ?>timer--finishing<?php endif; ?>">
                    <?= "$res[0] : $res[1]"; ?>
                  </div>
                </div>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else : ?>
        <h2>Ничего не найдено по вашему запросу</h2>
      <?php endif; ?>
    </section>
    <?php if ($pages_count > 1) : ?>
      <ul class="pagination-list">
        <?php $prev = $cur_page - 1; ?>
        <?php $next = $cur_page + 1; ?>
        <li class="pagination-item pagination-item-prev">
          <a <?php if ($cur_page >= 2) : ?> href="search.php?search=<?= $search; ?>&page=<?= $prev; ?>" <?php endif; ?>>Назад</a>
        </li>
        <?php foreach ($pages as $page) : ?>
          <li class="pagination-item <?php if ($page === $cur_page) : ?>pagination-item-active<?php endif; ?>">
            <a href="search.php?search=<?= $search; ?>&page=<?= $page; ?>"><?= $page; ?></a>
          </li>
        <?php endforeach; ?>
        <li class="pagination-item pagination-item-next">
          <a <?php if ($cur_page < $pages_count) : ?> href="search.php?search=<?= $search; ?>&page=<?= $next; ?>" <?php endif; ?>>Вперед</a>
        </li>
      </ul>
    <?php endif; ?>
  </div>
</main>