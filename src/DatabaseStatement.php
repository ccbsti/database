<?php

namespace Sti;

use \PDOStatement;


/**
 * Classe que representa um Statement
 */
class DatabaseStatement extends PDOStatement {

	public function display() {
		$result = $this->fetchAll();
		if( count($result) == 0 ) {
			echo "<table border='1'><tr style='background-color: #eee; font-weight: bolder; text-align: center;'><td>No results!</td></tr></table>";
			return false;
		}
		echo "<table border='1'>";
			echo "<tr style='background-color: #eee; font-weight: bolder; text-align: center;'>";
			foreach ( $result[0] as $key => $value) {
				echo "<td>$key</td>";
			}
			echo "</tr>";

			foreach ( $result as $r) {
				echo "<tr>";
				foreach ($r as $key => $value) {
					echo "<td>$value</td>";
				}
				echo "</tr>";
			}

		echo "</table>";
	}

}
