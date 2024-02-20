<main>
  <?= $navigation; ?>
  <div class="cats-wrapper container">
    <ul class="cats-list">
      <?php foreach ($cats as $value) : ?>
        <li class="cats-list__item">
          <?= "Categories: $value"; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</main>