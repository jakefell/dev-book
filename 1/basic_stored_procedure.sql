# Basic stored procedure example
delimiter //

CREATE PROCEDURE total_orders (out total float)
BEGIN
  SELECT SUM(amount) INTO total FROM orders;
END
//

delimiter ;