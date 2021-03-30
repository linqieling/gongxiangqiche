      <footer>
        <!-- 底部d导航栏 -->
        <ul class="bui-nav footer-nav">
          <li class="bui-btn bui-box-vertical [##if $ac eq '' || $ac eq 'index'##]active[##/if##]" onclick="window.location.href='[##$_SCONFIG.webroot##]'">
            <i class="icon">[##if $ac eq '' || $ac eq 'index'##]&#xe65a;[##else##]&#xe659;[##/if##]</i><div class="span1">[##if $_SESSION.lang eq 'english'##]Car[##else##]用车[##/if##]</div>
          </li>
          <li class="bui-btn bui-box-vertical [##if $ac eq 'orderlist'##]active[##/if##]" onclick="window.location.href='[##$_SCONFIG.webroot##]cp-orderlist.html'">
            <i class="icon">[##if $ac eq 'orderlist'##]&#xe62d;[##else##]&#xe62d;[##/if##]</i><div class="span1">[##if $_SESSION.lang eq 'english'##]order[##else##]订单[##/if##]</div>
          </li>
          <li class="bui-btn bui-box-vertical [##if $ac eq 'usermanage'##]active[##/if##]" onclick="window.location.href='[##$_SCONFIG.webroot##]cp-usermanage.html'">
            <i class="icon">[##if $ac eq 'usermanage'##]&#xe60f;[##else##]&#xe610;[##/if##]</i><div class="span1">[##if $_SESSION.lang eq 'english'##]my[##else##]我的[##/if##]</div>
          </li>
        </ul>
      </footer>

    </div>

  </body>

</html>