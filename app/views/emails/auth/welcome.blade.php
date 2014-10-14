<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width"/>
</head>

<body>
	<table border="0" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td>
					<p>{{ $first_name }},</p>

    			<p>Thanks for signing up for a Novelize beta account. While Novelize is built to be simple and easy to use, I thought I'd take a moment and go over the main ideas behind Novelize.</p>


		      <h3>Notebooks</h3>

		      <p>Notebooks are the tools you use to create your fictional world, including characters bios, story locations, important items, and research notes. Each notebook is tied to one or more novels, making it easy to keep related books together with one notebook.</p>

		      <p>{{ link_to_route('create_notebook', 'Creating a notebook', null, ['style' => 'color: #E25822']) }} is the first step to working with Novelize.</p>


		      <h3>Novels</h3>

		      <p>After you create your notebook, you can {{ link_to_route('create_novel', 'create', null, ['style' => 'color: #E25822']) }} your first novel. Soon, you can display notebook information on the side panel while you're writing.</p>

		      <p>Novelize breaks down your writing process into four parts: plot, write, review, and publish. This allows you to focus on what you're doing so you don't get stuck editing when you're supposed to be writing.</p>


		      <h3>Journal</h3>

		      <p>Novelize also includes a journal for you to record ideas that just don't fit into your notebooks. Maybe you have an idea for a future novel that you don't want to forget. Maybe you need a place to keep important grammar rules. In the end, it's up to you what you {{ link_to_route('create_entry', 'write', null, ['style' => 'color: #E25822']) }} about in your journal entries.</p>


					<h3>Give Feedback</h3>

					<p>Since Novelize is in beta at the moment, I would appreciate for you to  {{ link_to_route('view_contact', 'give feedback', [$user_id, 'feedback'], ['class' => 'feedback-link']) }} often so I can turn Novelize into the perfect app. In order to do that I need to know what you like, what you hate, and anything else you care to share about Novelize.</p>

					<p>Thanks for your support and enjoy Novelize!</p>

					<p>Josh Evensen<br/>
						 josh@getnovelize.com<br/>
						 <a href="https://www.facebook.com/novelizeapp">Facebook</a> | <a href="https://twitter.com/NovelizeIt">Twitter</a></p>

				</td>
			</tr>
		</tbody>
	</table>
</body>

</html>