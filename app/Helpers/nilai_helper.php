<?php

function bobot($grade) {
  switch ($grade) {
    case 'A' :
      return 4.00;
      break;
    case 'A-' :
      return 3.75;
      break;
    case 'B+' :
      return 3.50;
      break;
    case 'B' :
      return 3.25;
      break;
    case 'B-' :
      return 3.00;
      break;
    case 'C+' :
      return 2.75;
      break;
    case 'C' :
      return 2.50;
      break;
    case 'C-' :
      return 2.00;
      break;
    case 'D' :
      return 1.00;
      break;
    default :
      return 0.00;
      break;
  }
}