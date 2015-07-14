<?php
class Sousa
{
	public function total_display()
	{
        $seigyo = new Dummy_seigyo();
        return $seigyo->dummy_total_display();
	}
}
