<?php
require("cat.php");

          $cat1 = new Cat;
          $cat1->setColor("black");
          $cat1->setname("Zoe");
          $myCats[] = $cat1;
          
        $cat2 = new Cat;
          $cat2->setColor("orange");
          $cat2->setname("Garfield");
          $myCats[] = $cat2;
          
           $cat3 = new Cat;
          $cat3->setColor("tabby");
          $cat3->setname("Fluffy");
          $myCats[] = $cat3;
          
  CatListFun($myCats, "orange");
          
  
  
  
  function CatListFun($catsArray, $selectedColor)        
  {
      $colorCount = 0;
      for ($i=0; $i<count($catsArray); $i++)
       
        if($catsArray[$i]->getColor() == $selectedColor)
               $colorCount++;
       if($colorCount == 1)
         echo "There is " . $colorCount . " " . $selectedColor . " cat  .";
       else
         echo "There are " . $colorCount . " " . $selectedColor . " cats.";

  
  }
          
?>