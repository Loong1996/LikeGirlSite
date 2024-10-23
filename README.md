基于[Gitee kiCode111/like-girl5.1.0](https://gitee.com/kiCode111/LikeGirl_5.1.0)项目，继续开发

#### 更新记录
- 修复管理后台无法登录问题
- 删除了部分广告

#### 启动方法
- 作者是采用ngnix+php反向代理
- 创建mysql数据库并导入`love20240612.sql`文件
    - create database 数据库名;
    - use 数据库名;
    - source sql文件;
- 配置文件（`admin/Config_DB.php`）
    - 配置数据库、密码等
    - 请认真填写安全码 尽量设置的`复杂难以猜测` 修改密码等敏感信息需输入安全码
- 默认账号密码：`admin`/`lovezz`