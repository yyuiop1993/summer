<table cellpadding="2" cellspacing="1" width="98%">
    <tr> 
        <td width="110">后台编辑器样式：</td>
        <td><input type="radio" name="setting[toolbar]" value="basic" checked> 简洁型 <input type="radio" name="setting[toolbar]" value="full"> 标准型 </td>
    </tr>
    <tr> 
        <td>前台编辑器样式：</td>
        <td><input type="radio" name="setting[mbtoolbar]" value="basic" checked> 简洁型 <input type="radio" name="setting[mbtoolbar]" value="full"> 标准型 </td>
    </tr>
    <tr> 
        <td>默认值：</td>
        <td><textarea name="setting[defaultvalue]" rows="2" cols="20" id="defaultvalue" style="height:100px;width:99%"></textarea></td>
    </tr>
    <tr> 
        <td>是否保存远程图片：</td>
        <td><input type="radio" name="setting[enablesaveimage]" value="1"> 是 <input type="radio" name="setting[enablesaveimage]" value="0" checked> 否</td>
    </tr>
    <tr> 
        <td>编辑器默认高度：</td>
        <td><input type="text" name="setting[height]" value="200" size="4" class="input"> <span>px</span></td>
    </tr>
    <td>字段类型</td>
    <td>
        <select name="setting[fieldtype]">
            <option value="text">小型字符型(TEXT)</option>
            <option value="mediumtext" selected>中型字符型(MEDIUMTEXT)</option>
            <option value="longtext">大型字符型(LONGTEXT)</option>
        </select> </span>
    </td>
</table>