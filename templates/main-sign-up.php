<main>
  <nav class="nav">
    <ul class="nav__list container">
      <?php foreach ($categories as $category) : ?>
        <li class="nav__item">
          <a href="pages/all-lots.html"><?= $category["name_category"]; ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </nav>
  <?php $classname = isset($errors) ? "form--invalid" : ""; ?>
  <form class="form container <?= $classname; ?>" action="sign-up.php" method="POST" autocomplete="off">
    <h2>Регистрация нового аккаунта</h2>
    <?php $classname = isset($errors["email"]) ? "form__item--invalid" : ""; ?>
    <div class="form__item <?= $classname; ?>"> <!-- form__item--invalid -->
      <label for="email">E-mail <sup>*</sup></label>
      <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?= $user["email"] ?? ""; ?>">
      <span class="form__error"><?= $errors["email"] ?? null; ?></span>
    </div>
    <?php $classname = isset($errors["password"]) ? "form__item--invalid" : ""; ?>
    <div class="form__item <?= $classname; ?>">
      <label for="password">Пароль <sup>*</sup></label>
      <input id="password" type="password" name="password" placeholder="Введите пароль" value="<?= $user["password"] ?? ""; ?>">
      <span class="form__error">
        <?= $errors["password"] ?? null; ?>
      </span>
    </div>
    <?php $classname = isset($errors["name"]) ? "form__item--invalid" : "" ?>
    <div class="form__item <?= $classname; ?>">
      <label for="name">Имя <sup>*</sup></label>
      <input id="name" type="text" name="name" placeholder="Введите имя" value="<?= $user["name"] ?? ""; ?>">
      <span class="form__error"><?= $errors["name"] ?? null; ?></span>
    </div>
    <?php $classname = isset($errors["message"]) ? "form__item--invalid" : ""; ?>
    <div class="form__item <?= $classname; ?>">
      <label for="message">Контактные данные <sup>*</sup></label>
      <textarea id="message" name="message" placeholder="Напишите как с вами связаться">
        <?= $user["message"] ?? ""; ?>
      </textarea>
      <span class="form__error"><?= $errors["message"] ?? null; ?></span>
    </div>
    <?php $classname = isset($errors) ? "form__error--bottom" : ""; ?>
    <span class="form__error <?= $classname; ?>">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Зарегистрироваться</button>
    <a class="text-link" href="login.php">Уже есть аккаунт</a>
  </form>
</main>