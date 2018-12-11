<script id="notificationData" type="text/x-handlebars-template">

	{{#if data.adminLink  }}
		<li cmt-app="notify" cmt-controller="notification" cmt-action="hread" action="notify/notification/read?id={{data.id}}" consumed="{{data.consumed}}" redirect="{{siteUrl}}{{data.adminLink}}" >
			<span class="cmt-click {{#if data.consumed  }} text text-gray {{else}} link {{/if}}" type="notification"><b>{{data.title}}</b> - {{data.content}}</span>
		</li>
		{{else}}
		<li cmt-app="notify" cmt-controller="notification" cmt-action="hread" action="notify/notification/read?id={{data.id}}" consumed="{{data.consumed}}" >
			<span class="cmt-click {{#if data.consumed  }} text text-gray {{else}} link {{/if}}" type="notification"><b>{{data.title}}</b> - {{data.content}}</span>
		</li>
	{{/if}}

</script>

<script id="activityData" type="text/x-handlebars-template">

	{{#if data.adminLink  }}
		<li cmt-app="notify" cmt-controller="notification" cmt-action="hread" action="notify/activity/read?id={{data.id}}" consumed="{{data.consumed}}" redirect="{{siteUrl}}{{data.adminLink}}" >
			<span class="cmt-click {{#if data.consumed  }} text text-gray {{else}} link {{/if}}" type="activity"><b>{{data.title}}</b> - {{data.content}}</span>
		</li>
		{{else}}
		<li cmt-app="notify" cmt-controller="notification" cmt-action="hread" action="notify/activity/read?id={{data.id}}" consumed="{{data.consumed}}" >
			<span class="cmt-click {{#if data.consumed  }} text text-gray {{else}} link {{/if}}" type="activity"><b>{{data.title}}</b> - {{data.content}}</span>
		</li>
	{{/if}}

</script>

<script id="reminderData" type="text/x-handlebars-template">

	{{#if data.adminLink  }}
		<li cmt-app="notify" cmt-controller="notification" cmt-action="hread" action="notify/reminder/read?id={{data.id}}" consumed="{{data.consumed}}" redirect="{{siteUrl}}{{data.adminLink}}" >
			<span class="cmt-click {{#if data.consumed  }} text text-gray {{else}} link {{/if}}" type="reminder"><b>{{data.title}}</b> - {{data.content}}</span>
		</li>
		{{else}}
		<li cmt-app="notify" cmt-controller="notification" cmt-action="hread" action="notify/reminder/read?id={{data.id}}" consumed="{{data.consumed}}" >
			<span class="cmt-click {{#if data.consumed  }} text text-gray {{else}} link {{/if}}" type="reminder"><b>{{data.title}}</b> - {{data.content}}</span>
		</li>
	{{/if}}

</script>
