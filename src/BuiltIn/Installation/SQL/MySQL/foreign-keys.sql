
ALTER TABLE `pc_builtin_content_block`
  ADD CONSTRAINT `pc_builtin_content_block_ibfk_1` FOREIGN KEY (`Content`) REFERENCES `pc_core_content` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `pc_builtin_content_container`
  ADD CONSTRAINT `pc_builtin_content_container_ibfk_1` FOREIGN KEY (`Content`) REFERENCES `pc_core_content` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pc_builtin_content_container_ibfk_2` FOREIGN KEY (`Container`) REFERENCES `pc_core_container` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `pc_builtin_content_html`
  ADD CONSTRAINT `pc_builtin_content_html_ibfk_1` FOREIGN KEY (`Content`) REFERENCES `pc_core_content` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `pc_builtin_content_html_code`
  ADD CONSTRAINT `pc_builtin_content_html_code_ibfk_1` FOREIGN KEY (`Content`) REFERENCES `pc_core_content` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `pc_builtin_content_html_wrap`
  ADD CONSTRAINT `pc_builtin_content_html_wrap_ibfk_1` FOREIGN KEY (`Content`) REFERENCES `pc_core_content` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `pc_builtin_content_navigation`
  ADD CONSTRAINT `pc_builtin_content_navigation_ibfk_1` FOREIGN KEY (`Content`) REFERENCES `pc_core_content` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `pc_builtin_navigation_item`
  ADD CONSTRAINT `pc_builtin_navigation_item_ibfk_1` FOREIGN KEY (`Navigation`) REFERENCES `pc_builtin_content_navigation` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pc_builtin_navigation_item_ibfk_2` FOREIGN KEY (`Parent`) REFERENCES `pc_builtin_navigation_item` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pc_builtin_navigation_item_ibfk_3` FOREIGN KEY (`Previous`) REFERENCES `pc_builtin_navigation_item` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pc_builtin_navigation_item_ibfk_4` FOREIGN KEY (`PageItem`) REFERENCES `pc_core_page_url` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pc_builtin_navigation_item_ibfk_5` FOREIGN KEY (`UrlItem`) REFERENCES `pc_builtin_navigation_url` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `pc_builtin_navigation_url`
  ADD CONSTRAINT `pc_builtin_navigation_url_ibfk_1` FOREIGN KEY (`Item`) REFERENCES `pc_builtin_navigation_item` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `pc_builtin_content_register_simple`
  ADD CONSTRAINT `pc_builtin_content_register_simple_ibfk_1` FOREIGN KEY (`Content`) REFERENCES `pc_core_content` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pc_builtin_content_register_simple_ibfk_2` FOREIGN KEY (`ConfirmUrl`) REFERENCES `pc_core_page_url` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pc_builtin_content_register_simple_ibfk_3` FOREIGN KEY (`NextUrl`) REFERENCES `pc_core_page_url` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `pc_builtin_content_register_confirm`  
  ADD CONSTRAINT `pc_builtin_content_register_confirm_ibfk_3` FOREIGN KEY (`Content`) REFERENCES `pc_core_content` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pc_builtin_content_register_confirm_ibfk_2` FOREIGN KEY (`ErrorUrl`) REFERENCES `pc_core_page_url` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pc_builtin_content_register_confirm_ibfk_1` FOREIGN KEY (`SuccessUrl`) REFERENCES `pc_core_page_url` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `pc_builtin_content_login`
  ADD CONSTRAINT `pc_builtin_content_login_ibfk_3` FOREIGN KEY (`Content`) REFERENCES `pc_core_content` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pc_builtin_content_login_ibfk_1` FOREIGN KEY (`PasswordUrl`) REFERENCES `pc_core_page_url` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pc_builtin_content_login_ibfk_2` FOREIGN KEY (`NextUrl`) REFERENCES `pc_core_page_url` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `pc_builtin_content_logout`
  ADD CONSTRAINT `pc_builtin_content_logout_ibfk_2` FOREIGN KEY (`NextUrl`) REFERENCES `pc_core_page_url` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pc_builtin_content_logout_ibfk_1` FOREIGN KEY (`Content`) REFERENCES `pc_core_content` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `pc_builtin_register_confirm_membergroup`
  ADD CONSTRAINT `pc_builtin_register_confirm_membergroup_ibfk_2` FOREIGN KEY (`MemberGroup`) REFERENCES `pc_core_membergroup` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pc_builtin_register_confirm_membergroup_ibfk_1` FOREIGN KEY (`Confirm`) REFERENCES `pc_builtin_content_register_confirm` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `pc_builtin_content_repeater`
  ADD CONSTRAINT `pc_builtin_content_repeater_ibfk_1` FOREIGN KEY (`Content`) REFERENCES `pc_core_content` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
