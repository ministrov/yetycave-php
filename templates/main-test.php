<main>
  <div class="cats-wrapper container">
    <ul class="cats-list">
      <?php foreach ($cats as $value) : ?>
        <li>
          <?= "Categories: $value" ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</main>