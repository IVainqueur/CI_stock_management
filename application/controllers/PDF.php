<?php
require("Libraries/fpdf.php");
class PDF extends FPDF
{
    function BasicTable($header, $data)
    {
        foreach ($header as $headKey => $head) {
            // $this->SetFont('', 'B');
            $this->SetFillColor(71, 85, 105);
            $this->SetTextColor(255);
            /* DETERMINE Size of header by the content */
            $dataAndHead = array_merge($this->getArrayByIndex($data, $headKey), array($head));
            $maxlen = $this->getLongest($dataAndHead);
            $this->Cell($maxlen, 12, $head, 1, 0, '', true);
        }
        $this->Ln();
        foreach ($data as $rowKey => $row) {
            $this->SetFont('');
            $this->SetTextColor(0);
            foreach ($row as $colKey => $col) {
                /* DETERMINE Size of row by the size of other content */
                $dataAndHead = array_merge($this->getArrayByIndex($data, $colKey), array($header[$colKey]));
                $maxlen = $this->getLongest($dataAndHead);
                $this->Cell($maxlen, 12, $col, 1);
            }
            $this->Ln();
        }
    }

    public function getLongest($arr, $hasArray = FALSE)
    {
        if ($hasArray) {
            $max = $this->GetStringWidth($arr[0][0]);
        } else {
            $max = $this->GetStringWidth($arr[0]);
        }
        foreach ($arr as $el) {
            if (!$hasArray) {
                if ($this->GetStringWidth($el) > $max)
                    $max = $this->GetStringWidth($el);
            } else {
                foreach ($el as $subel) {
                    if ($this->GetStringWidth($subel) > $max)
                        $max = $this->GetStringWidth($subel);
                }
            }
        }
        return $max+5;
    }
    public function getArrayByIndex($arr, $index)
    {
        $newArr = array();
        foreach ($arr as $el) {
            if (!isset($el[$index]))
                continue;
            $newArr[] = $el[$index];
        }
        return $newArr;
    }
}
