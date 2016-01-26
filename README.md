# PHP Shorten Vars

NOTE: This does not currently work, still WIP

# What it does

This will take a (supports multi-dimensional & objects) array and swap all the keys out with shortened versions, this is useful for email templating. E.g:

```
$order->billing_first_name = $o->b_f_n
$order->billing_last_name = $o->b_l_n

$order->billing_address1 = $o->b_a1
$order->billing_address2 = $o->b_a2
```
