/*              EXERCICE 1              */
SELECT CompanyName AS `Société`, ContactName AS `Contact`, ContactTitle AS `Fonction`, Phone AS `Téléphone` FROM customers WHERE Country = "France"

/*              EXERCICE 2              */
SELECT ProductName AS `Produit`, UnitPrice AS `Prix` FROM products JOIN suppliers ON suppliers.SupplierID = products.SupplierID WHERE CompanyName = "Exotic Liquids"

/*              EXERCICE 3              */
SELECT suppliers.CompanyName AS `Fournisseur`, COUNT(ProductName) AS `Nombre de produits` FROM products JOIN suppliers ON suppliers.SupplierID = products.SupplierID WHERE Country = "France" GROUP BY suppliers.CompanyName ORDER BY COUNT(ProductName) DESC

/*              EXERCICE 4              */
SELECT orders.ShipName AS `Client`, COUNT(orders.OrderID) AS `Nombre de commandes` FROM orders WHERE orders.ShipCountry = "France" GROUP BY orders.ShipName HAVING COUNT(orders.OrderID) > 10

/*              EXERCICE 5              */
SELECT orders.ShipName AS `Client`, SUM(`order details`.UnitPrice * `order details`.Quantity) AS `Chiffre d'Affaire`, orders.ShipCountry AS `Pays` FROM orders INNER JOIN `order details` ON orders.OrderID = `order details`.OrderID GROUP BY orders.ShipName, orders.ShipCountry HAVING SUM(`order details`.UnitPrice * `order details`.Quantity) > 30000 ORDER BY SUM(`order details`.UnitPrice * `order details`.Quantity) DESC

/*              EXERCICE 6              */
SELECT DISTINCT orders.ShipCountry AS `Pays` FROM orders JOIN `order details` ON orders.OrderID = `order details`.OrderID JOIN products ON `order details`.ProductID = products.ProductID JOIN suppliers ON products.SupplierID = suppliers.SupplierID WHERE suppliers.CompanyName = "Exotic Liquids" ORDER BY orders.ShipCountry

/*              EXERCICE 7              */
SELECT SUM(`order details`.UnitPrice * `order details`.Quantity) AS `Montant Ventes 97` FROM `order details` JOIN orders ON `order details`.OrderID = orders.OrderID WHERE YEAR(orders.orderDate) = 1997

/*              EXERCICE 8              */
SELECT MONTH(orders.OrderDate) AS `Mois 97`, SUM(`order details`.UnitPrice * `order details`.Quantity) AS `Montant Ventes 97` FROM `order details` JOIN orders ON `order details`.OrderID = orders.OrderID WHERE YEAR(orders.orderDate) = 1997 GROUP BY MONTH(orders.OrderDate)

/*              EXERCICE 9              */
SELECT orders.OrderDate AS `Date de la dernière commande` FROM orders WHERE orders.ShipName = "Du monde entier" GROUP BY orders.OrderDate DESC LIMIT 0,1

/*              EXERCICE 10              */
SELECT ROUND(AVG(DATEDIFF(orders.ShippedDate, orders.OrderDate))) AS `Délai moyen de livraison en jours` FROM orders