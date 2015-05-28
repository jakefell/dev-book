# Procedure to find the orderid with the largest amount
# could be done with max, but just to illustrate stored procedure principles

DELIMITER //

CREATE PROCEDURE largest_order(out largest_id int)
BEGIN
  DECLARE this_id int;
  DECLARE this_amount float;
  DECLARE l_amount float DEFAULT 0.0;
  DECLARE l_id int;

  DECLARE done int DEFAULT 0;
  DECLARE c1 CURSOR FOR SELECT orderid, amount FROM orders;
  DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET done = 1;

  OPEN c1;
  REPEAT
    FETCH c1 INTO this_id, this_amount;
    IF NOT done THEN
      IF this_amount > l_amount THEN
        SET l_amount = this_amount;
        SET l_id = this_id;
      END IF;
    END IF;
  UNTIL done END REPEAT;

  CLOSE c1;

  SET largest_id = l_id;
END
//

DELIMITER ;