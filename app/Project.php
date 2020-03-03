<?php

namespace App;

class Project extends Model
{
  protected static $tableName = 'projects';

  public function appendTraffic() {
      $totalWorkSum = Work::where('project_id', '=', $this->id)
                            ->sum('amount');
      $totalPaymentsSum = Payment::where('project_id', '=', $this->id)
                                  ->sum('amount');
      $firstDayOfTheYear = date('Y-01-01 00:00:00');
      $paymentsSum = Payment::where('done_on', '>=', $firstDayOfTheYear)
                              ->where('project_id', '=', $this->id)
                              ->sum('amount');
      $this->incomeThisYear = $paymentsSum;
      $this->openThisYear = $totalWorkSum - $totalPaymentsSum;
  }
}
