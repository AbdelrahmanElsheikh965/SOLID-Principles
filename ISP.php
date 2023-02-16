<?php

# Interface Segregation Principle

/*  A client should never be forced to implement an interface that it doesn't use,
 *  or clients shouldn't be forced to depend on methods they do not use.
*/

interface TypesToExport
{
    public function pdf();
    public function xlsx();
}

// class CV implements TypesToExport{
//     function pdf(){
//         return 'this is pdf';
//     }
//    // Error : CVs do not need to be in xlsx format
// }

class Employee implements TypesToExport{
    public function pdf()
    {
        return 'this is pdf';   
    }
    public function xlsx(){
        return 'this is xlsx';
    }
}

# Solution is interface segragation

interface PDFresult{
    public function toPdf();
}

interface XLSXresult{
    public function toXlsx();
}

class Pdfable implements PDFresult{
    public function toPdf()
    {
        return 'this is pdf';
    }
}

class xlsxable implements XLSXresult{
    public function toXlsx()
    {
        return 'this is xlsx';
    }
}

// Now we got 2 separate interfaces with 2 different tasks
// Each of which is responsiple for something specific.

