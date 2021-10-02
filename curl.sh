curl -X GET "localhost:8080/orders"

curl -X POST "localhost:8080/orders" -H 'Content-Type: application/json' -d'
{
  "first": "away",
  "last": "contain",
  "middle": "avoid",
  "number_shipped": 3174,
  "order_date": "2021-10-16",
  "product_id": 4492,
  "title": "forget"
}
'

curl -X POST "localhost:8080/orders/910" -H 'Content-Type: application/json' -d'
{
  "first": "away",
  "id": 910,
  "last": "contain",
  "middle": "avoid",
  "number_shipped": 3174,
  "order_date": "2021-10-16",
  "product_id": 4492,
  "title": "forget"
}
'

curl -X GET "localhost:8080/orders/910"

curl -X DELETE "localhost:8080/orders/910"

# --

curl -X GET "localhost:8080/products"

curl -X POST "localhost:8080/products" -H 'Content-Type: application/json' -d'
{
  "inventory_on_hand": 8025,
  "inventory_received": 1032,
  "inventory_shipped": 6313,
  "minimum_required": 8029,
  "part_number": "stay",
  "product_label": "customer",
  "product_name": "environment",
  "starting_inventory": 8932
}
'

curl -X POST "localhost:8080/products/845" -H 'Content-Type: application/json' -d'
{
  "id": 845,
  "inventory_on_hand": 8025,
  "inventory_received": 1032,
  "inventory_shipped": 6313,
  "minimum_required": 8029,
  "part_number": "stay",
  "product_label": "customer",
  "product_name": "environment",
  "starting_inventory": 8932
}
'

curl -X GET "localhost:8080/products/845"

curl -X DELETE "localhost:8080/products/845"

# --

curl -X GET "localhost:8080/purchases"

curl -X POST "localhost:8080/purchases" -H 'Content-Type: application/json' -d'
{
  "number_received": 3185,
  "product_id": 5326,
  "purchase_date": "2021-09-21",
  "supplier_id": 5821
}
'

curl -X POST "localhost:8080/purchases/4860" -H 'Content-Type: application/json' -d'
{
  "id": 4860,
  "number_received": 3185,
  "product_id": 5326,
  "purchase_date": "2021-09-21",
  "supplier_id": 5821
}
'

curl -X GET "localhost:8080/purchases/4860"

curl -X DELETE "localhost:8080/purchases/4860"

# --

curl -X GET "localhost:8080/suppliers"

curl -X POST "localhost:8080/suppliers" -H 'Content-Type: application/json' -d'
{
  "supplier": "course"
}
'

curl -X POST "localhost:8080/suppliers/1502" -H 'Content-Type: application/json' -d'
{
  "id": 1502,
  "supplier": "course"
}
'

curl -X GET "localhost:8080/suppliers/1502"

curl -X DELETE "localhost:8080/suppliers/1502"

# --

