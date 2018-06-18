{*Страница продукта*}
<h3>{$rsProduct['name']}</h3>
<img src="/images/products/{$rsProduct['image']}" width="575">
Стоимость: {$rsProduct['price']}

<a href="#" alt="Убрать из корзины"  {if $inCart == 0}class="hideme"{/if} id="removeCart_{$rsProduct['id']}" onclick="removeFromCart({$rsProduct['id']}); return false;">Убрать из корзины</a>
<a href="#" alt="Добавить в корзину" {if $inCart == 1}class="hideme"{/if} id="addCart_{$rsProduct['id']}" onclick="addToCart({$rsProduct['id']}); return false;">Добавить в корзину</a>
<p>Описание<br />{$rsProduct['description']}</p>