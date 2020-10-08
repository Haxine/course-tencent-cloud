{% if resources %}
    <table class="kg-table layui-table">
        <tr>
            <th>名称</th>
            <th>类型</th>
            <th>大小</th>
            <th>日期</th>
            <th width="15%">操作</th>
        </tr>
        {% for item in resources %}
            {% set update_url = url({'for':'admin.resource.update','id':item.id}) %}
            {% set delete_url = url({'for':'admin.resource.delete','id':item.id}) %}
            {% set download_url = url({'for':'home.download','md5':item.upload.md5}) %}
            <tr>
                <td><input class="layui-input res-name" type="text" value="{{ item.upload.name }}" data-url="{{ update_url }}"></td>
                <td>{{ item.upload.mime }}</td>
                <td>{{ item.upload.size|human_size }}</td>
                <td>{{ date('Y-m-d H:i:s',item.create_time) }}</td>
                <td>
                    <a class="layui-btn layui-btn-sm layui-bg-red res-btn-delete" href="javascript:" data-url="{{ delete_url }}">删除</a>
                    <a class="layui-btn layui-btn-sm" href="{{ download_url }}" target="_blank">下载</a>
                </td>
            </tr>
        {% endfor %}
    </table>
    <br>
{% else %}
    <div class="kg-center">没有相关资料</div>
    <br>
{% endif %}