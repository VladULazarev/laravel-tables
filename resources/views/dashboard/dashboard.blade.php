<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden content">
          <div class="row">

            <div class="col-md-6">

              <div class="col-12 mb-3">
                <div class="cart">
                  <h5 class="mb-0">How to use the app</h5>
                </div>
              </div>

              <div class="col-12 mb-3">
                <div class="cart">
                  <p>The purpose of the app is to manage the DB tables.</p>
                  <p>So, we have 4 tables - Customers, Products, Orders, Categories.</p>
                  <p>Let's see what we can do with each of the table.</p>
                </div>
              </div>

              <div class="col-12 mb-3">
                <div class="cart">
                  <p class="blue-text mb-3">For all tables</h5>
                  <p>You can <b>select the column name</b> for searching from the
                    'Select data for search' menu.
                  </p>
                  <p class="mb-3">Then, start typing in the 'Search...' field.
                    You will see the records matching the query.
                  </p>

                  <p>If the column has a <b>numeric value</b> you have to type out one integer.</p>
                  <p class="mb-3">If the column has a <b>string value</b> you have
                    to type out two characters.
                  </p>

                  <p>You can <b>create a new record</b> if you press the button
                    'Create a customer' or 'Create a product' and so on...
                  </p>
                  <p class="mb-3">You can <b>edit</b> or <b>delete a record</b>
                    if you press 'Edit' or 'Delete' button.
                  </p>

                  <p>You can <b>reset search parameters</b> by pressing the 'Reset search' button.</p>
                </div>
              </div>

              <div class="col-12 mb-3">
                <div class="cart">
                  <p class="blue-text mb-3">Customers</p>
                  <p>If you click the 'Last Name' you get <b>all orders of this customer</b>.</p>
                </div>
              </div>

              <div class="col-12 mb-3">
                <div class="cart">
                  <p class="blue-text mb-3">Products and Orders</p>

                  <p class="mb-3">You can see the current 'min' and 'max' price values
                    or the total sum of the order in the corresponding fields.
                  </p>

                  <p class="mb-3">If you'd like to <b>set the limit of the price or the total
                    sum for searching</b> you can set 'Min price' or 'Max price' or both and
                    press the button 'Set price values' or 'Set sum values' accordinly.
                  </p>

                  <p>If you'd like to <b>just reset the price or the total sum values</b>
                    you have to press 'Set price values' or 'Set sum values' button without
                    typing new values.
                  </p>
                </div>
              </div>

              <div class="col-12 mb-3">
                <div class="cart">
                  <p class="blue-text mb-3">Orders</p>
                  <p>If you click the 'Customer' you get <b>all orders of this customer</b>.</p>
                </div>
              </div>

              <div class="col-12 mb-3">
                <div class="cart">
                  <p class="blue-text mb-3">Categories</p>
                  <p>You will not be able to delete a category if there is at
                    least one product in the DB from this category.
                  </p>
                </div>
              </div>

              <div class="col-12 mb-3">
                <div class="cart">
                  <p>If you have any questions feel free to drop me an email:
                    <a href="mailto:getyourbestsite@gmail.com" class="blue-text mb-3">getyourbestsite@gmail.com</a>
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-6">

              <div class="col-12 mb-3">
                <div class="cart">
                  <h5 class="mb-0">Как это работает</h5>
                </div>
              </div>

              <div class="col-12 mb-3">
                <div class="cart">
                  <p>Приложение предназначено для управления таблицами БД.</p>
                  <p>Итак, у нас есть 4 таблицы - Customers, Products, Orders, Categories.</p>
                  <p>Давайте посмотрим, что мы можем сделать с каждой таблицей.</p>
                </div>
              </div>

              <div class="col-12 mb-3">
                <div class="cart">
                  <p class="blue-text mb-3">Правила для всех таблиц</h5>
                  <p>Вы можете <b>выбрать имя столбца</b> для поиска из
                    меню 'Select data for search'.
                  </p>
                  <p class="mb-3">Затем, начните вводить символы в поле 'Search...'.
                    Вы увидите записи, соответствующие запросу..
                  </p>

                  <p>Если столбец имеет <b>числовое значение</b>, вы должны ввести одно целое число.</p>
                  <p class="mb-3">Если столбец имеет <b>строковое значение</b>,
                  то нужно ввести не менее двух символов.
                  </p>

                  <p>Вы можете <b>создать новую запись</b> нажав на кнопку
                    'Create a customer' или 'Create a product' и т. п...
                  </p>
                  <p class="mb-3">Вы можете <b>отредактировать</b> или <b>удалить запись</b>.
                    Кнопки 'Edit' или 'Delete'.
                  </p>

                  <p>Вы можете <b>сбросить параметры поиска</b>, нажав кнопку 'Reset search'.</p>
                </div>
              </div>

              <div class="col-12 mb-3">
                <div class="cart">
                  <p class="blue-text mb-3">Customers</p>
                  <p>Если вы нажмете 'Last Name', вы получите <b>все заказы этого клиента</b>.</p>
                </div>
              </div>

              <div class="col-12 mb-3">
                <div class="cart">
                  <p class="blue-text mb-3">Products and Orders</p>

                  <p class="mb-3">Вы можете увидеть текущие минимальные('min') и максимальные('max') значения
                     цены продукта или суммы заказа в соответствующих полях.
                  </p>

                  <p class="mb-3">Если вы хотите <b>установить предел цены
                     для поиска</b> вы можете установить 'Min price' или 'Max price' или оба и
                     нажмите кнопку 'Set price values' или 'Set sum values' соответственно.
                  </p>

                  <p>Если вы хотите <b>сбросить значения цены или общей суммы</b>
                     необходимо нажать кнопку 'Set price values' или 'Set sum values' без
                     ввода новых значений.
                   </p>
                </div>
              </div>

              <div class="col-12 mb-3">
                <div class="cart">
                  <p class="blue-text mb-3">Orders</p>
                  <p>Если вы нажмете 'Customer', вы получите <b>все заказы этого клиента</b>.</p>
                </div>
              </div>

              <div class="col-12 mb-3">
                <div class="cart">
                  <p class="blue-text mb-3">Categories</p>
                  <p>Вы не сможете удалить категорию, если есть
                     хотя бы один товар в БД из этой категории.
                   </p>
                </div>
              </div>

              <div class="col-12 mb-3">
                <div class="cart">
                  <p>Если у вас есть какие-либо вопросы, напишите мне по электронной почте:
                    <a href="mailto:getyourbestsite@gmail.com" class="blue-text mb-3">getyourbestsite@gmail.com</a>
                  </p>
                </div>
              </div>
              </div>

          </div> <!-- end row -->
        </div>
    </div>
  </div>
</x-app-layout>
