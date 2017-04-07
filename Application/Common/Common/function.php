<?php

/**
 * 公共函数库
 *
 * @author WK
 * @copyright  2017, 云道
 * @version 2017-04-03
 */

/**
 * 给前端返回JSON字符串
 *
 * @param int $status 状态码，1表示成功，非1表示失败
 * @param string $msg 提示信息
 * @param array $data 数据
 *
 * @return string 如:{'status':1,'msg':'成功','data':{'count':150,'list':[{'id':1,'name':'li'},{'id':2,'name':'liu'}]}}
 */
function returnJson($status = 0, $msg = '', $data = '') {
    $result['status'] = $status;
    $result['msg'] = $msg;
    $result['data'] = $data;
    exit(json_encode($result));
}


/**
 * 导出excel
 * 
 * @author WK
 * 
 * @param type $th 数据头 array
 * @param type $data 数据源 array
 * @param type $title 数据title String
 * @param type $filename 导出文件名
 */
function createExcel($th = array(), $data = array(), $title = "", $filename = "excel导出") {
    Vendor('phpExcel.PHPExcel');
    Vendor('phpExcel.ExcelAssistant');
    $objExcel = new PHPExcel();
    $objExcel->getProperties()->setCreator("世纪云道");
    $objExcel->setActiveSheetIndex(0);
    $excelAssistant = new ExcelAssistant();
    $excelTit_array = $excelAssistant->GetExcelTit(count($th));

    $i = 1;
    $field_width_array = array();
    $field_array = array();
    $row_height_array = 15;

    if ($title !== "") {
        $mergeCells_name = $excelTit_array[0] . ($i) . ":" . $excelTit_array[count($excelTit_array) - 1] . $i;
        $objExcel->getActiveSheet()->mergeCells($mergeCells_name);
        $objExcel->getActiveSheet()->setCellValue("A1", $title);
        $objExcel->getActiveSheet()->getStyle('A1')->applyFromArray(
                array(
                    'font' => array(
                        'bold' => true
                    ),
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
                    )
                )
        );
        $i = 2;
    }
    if (count($field_width_array) > 0) {
        foreach ($excelTit_array as $k => $v) {
            $objExcel->getActiveSheet()->getColumnDimension($v)->setWidth($field_width_array[$k]);
        }
    } else {
        foreach ($excelTit_array as $k => $v) {
            $objExcel->getActiveSheet()->getColumnDimension($v)->setWidth(20);
        }
    }
    foreach ($th as $k => $v) {
        $objExcel->getActiveSheet()->setCellValue(($excelTit_array[$k]) . $i, "$v");
        $objExcel->getActiveSheet()->getStyle(($excelTit_array[$k]) . $i)->applyFromArray(
                array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
                    )
                )
        );
    }
    if (count($field_array) > 0) {
        foreach ($data as $k => $v) {
            $i++;
            $c_nul = 0;
            foreach ($field_array as $key => $value) {
                $c_v = $excelTit_array[$c_nul++] . $i;
                $objExcel->getActiveSheet()->setCellValue($c_v, $v[$value]);
                $objExcel->getActiveSheet()->getStyle($c_v)->applyFromArray(
                        array(
                            'alignment' => array(
                                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
                            )
                        )
                );
            }
        }
    } else {
        foreach ($data as $k => $v) {
            $i++;
            $c_nul = 0;
            foreach ($v as $index => $d) {
                $c_v = $excelTit_array[$c_nul++] . $i;
                $objExcel->getActiveSheet()->setCellValue($c_v, $d);
                $objExcel->getActiveSheet()->getStyle($c_v)->applyFromArray(
                        array(
                            'alignment' => array(
                                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
                            )
                        )
                );
            }
        }
    }
    for ($x = 0; $x <= count($data) + 2; $x++) {
        $objExcel->getActiveSheet()->getRowDimension($x)->setRowHeight($row_height_array);
    }

    $timestamp = time();
    $timestr = date("Y-m-d", $timestamp);
    header('Content-Type: application/vnd.ms-excel;charset=utf-8');
    header('Content-Disposition: attachment;filename="' . $filename . '@' . $timestr . '.xls"');
    header('Cache-Control: max-age=0');
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
    header("Content-Type:application/force-download");
    header("Content-Type:application/octet-stream");
    header("Content-Type:application/download");
    header("Content-Transfer-Encoding:binary");
    $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel5');
    ob_clean();
    $objWriter->save("php://output");
}


/**
 * @验证手机号是否正确
 * @author WK
 * @param INT $mobile
 */

function isMobile($mobile) {
    if (!is_numeric($mobile)) {
        return false;
    }
    return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
}

/**
 * 二维数组排序
 * @author WK
 * @param array $array 要排序的数组
 * @param string $key 要排序的键名
 * @param Enmu $order 接受asc或者desc，排序的方式
 * 
 * @return array 排序后的数组
 */
function sortForSecondArr($array, $key, $order = "asc") {
    $arr_nums = $arr = array();
    foreach ($array as $k => $v) {
        $arr_nums[$k] = $v[$key];
    }
    if ($order == 'asc') {
        asort($arr_nums);
    } else {
        arsort($arr_nums);
    }
    foreach ($arr_nums as $k => $v) {
        $arr[$k] = $array[$k];
    }
    return $arr;
}

/**
 * 获取客户端的IP
 * 
 * @return string 返回用户的真实IP
 */
function getClientIP() {
    return $_SERVER["REMOTE_ADDR"];
}

/**
 * 创建一个目录
 * @author WK
 * @param string $dir 目录
 * @param type $mode  模式
 * @return boolean    成功与否
 */
function mkDirs($dir, $mode = 0777) {
    if (!is_dir($dir)) {
        return mkdir($dir, $mode);
    }
    return true;
}

/**
 * 对参数进行urlencode编码
 *  @author WK
 * @param string|array $param 
 * @return string|array 过滤后的数组
 */
function myurlencode($param) {
    if (!is_array($param))
        return urlencode($param);
    foreach ($param as $key => $value) {
        $param[$key] = urlencode($value);
    }
    return $param;
}
